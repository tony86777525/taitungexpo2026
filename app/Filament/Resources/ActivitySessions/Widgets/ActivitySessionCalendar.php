<?php

namespace App\Filament\Resources\ActivitySessions\Widgets;

use App\Enums\ActivitySessionType;
use App\Filament\Resources\ActivityReservationNormals\ActivityReservationNormalResource;
use App\Filament\Resources\ActivityReservationVips\ActivityReservationVipResource;
use App\Models\ActivitySession;
use App\Models\Project;
use Carbon\Carbon;
use Filament\Actions\Action;
use Guava\Calendar\Filament\CalendarWidget;
use Guava\Calendar\ValueObjects\CalendarEvent;
use Guava\Calendar\ValueObjects\EventClickInfo;
use Guava\Calendar\ValueObjects\FetchInfo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Guava\Calendar\Enums\CalendarViewType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\HtmlString;

class ActivitySessionCalendar extends CalendarWidget
{
    protected string | HtmlString | null | bool $heading = '預約行程日曆';
    protected bool $eventClickEnabled = true;
    protected ?string $defaultEventClickAction = 'edit';

    public ?array $venuesFilter = null;

    protected CalendarViewType $calendarView = CalendarViewType::TimeGridWeek;

    protected function getEvents(FetchInfo $info): Collection | array | Builder
    {
        $currentUser = auth()->user();

        return ActivitySession::query()
            ->select('activity_sessions.*')
            ->with([
                'project',
            ])
            ->withCount([
                'bookedActivityReservations',
            ])
            ->rightJoin('projects', 'projects.id', '=', 'activity_sessions.project_id')
            ->rightJoin('zones', 'zones.id', '=', 'projects.zone_id')
            ->where('activity_sessions.is_active', true)
            ->where('projects.is_active', true)
            // 分場館預約系統管理者 只能看到所屬場館的內容
            ->when($currentUser->hasRole('venue_reservation_system_admin') && !empty($currentUser->project_id), function ($query) use ($currentUser) {
                $query
                    ->where('activity_sessions.project_id', $currentUser->project_id)
                    ->where('activity_sessions.type', ActivitySessionType::NORMAL);
            })
            ->when(!empty($this->venuesFilter), function ($query) {
                $query->where(function ($query) {
                    foreach ($this->venuesFilter as $venue) {
                        // \D+ 匹配非數字（即字母），\d+ 匹配數字
                        // P<name> 是 PHP 正規表達式的命名分組語法
                        if (preg_match('/(?P<zone>\D+)(?P<project_number>\w+)/', $venue, $matches)) {
                            $result = [
                                'zone' => $matches['zone'],
                                'project_number' => $matches['project_number'],
                            ];

                            $query
                                ->orWhere('zones.code', $result['zone'])
                                ->where('projects.project_number', $result['project_number']);
                        } else {
                            return $query->where(DB::raw(1), 0);
                        }
                    }
                });
            })
            ->orderBy('activity_sessions.start_time')
            ->get()
            ->map(function (ActivitySession $activitySession) {
                $groupCountStatusText = "{$activitySession->group_booked_count} / {$activitySession->group_max_count}";

                $typeText = $activitySession->type?->label() ?? 'Normal';

                return CalendarEvent::make($activitySession)
                    ->title("{$activitySession->display_time_range}\n【{$typeText}】{$groupCountStatusText}\n{$activitySession->project->venue_number}")
                    // 設定開始與結束時間 (需為 Carbon 物件或字串)
                    ->start(Carbon::parse($activitySession->date . ' ' . $activitySession->start_time))
                    ->end(Carbon::parse($activitySession->date . ' ' . $activitySession->end_time))
                    ->allDay()
                    // 根據狀態設定顏色
                    ->backgroundColor($activitySession->booked_status_color)
                    ->textColor('#000');
            });
    }

    public function getOptions(): array
    {
        return [
            // 1. 強制顯示結束時間
            'displayEventEnd' => true,

            // 2. 自定義時間顯示格式 (例如 15:00 - 15:30)
            'eventTimeFormat' => [
                'hour' => '2-digit',
                'minute' => '2-digit',
                'meridiem' => false,
                'hour12' => false, // 使用 24 小時制
            ],

            // 3. 設定時間分隔符號
            'eventDisplay' => 'block', // 讓事件以塊狀顯示，通常更容易看到完整時間
        ];
    }

    // 設定點擊事件：跳轉到編輯頁面
    public function onEventClick(EventClickInfo $info, Model $event, ?string $action = null): void
    {
        $type = $info->record->type;

        if ($type === ActivitySessionType::NORMAL) {
            $this->redirect(ActivityReservationNormalResource::getUrl('index', [
                'filters[date][value]=' => $info->record->id,
            ]));
        }

        if ($type === ActivitySessionType::VIP) {
            $this->redirect(ActivityReservationVipResource::getUrl('index', [
                'filters[date][value]=' => $info->record->id,
            ]));
        }
    }

    /**
     * 在 Widget 右上角加入篩選按鈕
     */
    public function getHeaderActions(): array
    {
        $currentUser = auth()->user();

        $venues = Project::query()
            ->with([
                'zone'
            ])
            ->when($currentUser->hasRole('venue_reservation_system_admin') && !empty($currentUser->project_id), function ($query) use ($currentUser) {
                $query
                    ->where('id', $currentUser->project_id);
            })
            ->get()
            ->pluck(function ($data) {
                return $data->display_venue_number;
            }, function ($data) {
                return $data->display_venue_number;
            });

        return [
            Action::make('filter')
                ->label('過濾狀態')
                ->icon('heroicon-m-funnel')
                // 2. 每次打開 Modal 時，將目前的類別屬性值填入表單
                ->mountUsing(fn ($form) => $form->fill([
                    'venues' => $this->venuesFilter,
                ]))
                ->form([
                    \Filament\Forms\Components\CheckboxList::make('venues')
                        ->label('場館')
                        ->options($venues),
                ])
                ->action(function ($data) {
                    $this->venuesFilter = $data['venues'];
                    // 關鍵：通知 Calendar 重新抓取資料
                    $this->refreshRecords();
                })
                ->modalSubmitActionLabel('套用'),

            Action::make('clearFilter')
                ->label('清除')
                ->color('gray')
                ->action(function () {
                    $this->venuesFilter = null;
                    $this->refreshRecords();
                })
        ];
    }
}
