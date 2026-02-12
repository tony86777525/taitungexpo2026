<?php

namespace App\Filament\Resources\ActivitySessions\Widgets;

use App\Filament\Resources\ActivityReservations\ActivityReservationResource;
use App\Models\ActivitySession;
use Carbon\Carbon;
use Guava\Calendar\Filament\CalendarWidget;
use Guava\Calendar\ValueObjects\CalendarEvent;
use Guava\Calendar\ValueObjects\EventClickInfo;
use Guava\Calendar\ValueObjects\FetchInfo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ActivitySessionCalendar extends CalendarWidget
{
    protected bool $eventClickEnabled = true;
    protected ?string $defaultEventClickAction = 'edit';

    protected function getEvents(FetchInfo $info): Collection | array | Builder
    {
        return ActivitySession::query()
            ->with([
                'activity',
                'activityReservations',
            ])
            ->get()
            ->map(function (ActivitySession $session) {
                return CalendarEvent::make($session)
                    ->title("{$session->activity->project->venue_number}")
                    // 設定開始與結束時間 (需為 Carbon 物件或字串)
                    ->start(Carbon::parse($session->date . ' ' . $session->start_time))
                    ->end(Carbon::parse($session->date . ' ' . $session->end_time))
                    // 根據狀態設定顏色
                    ->backgroundColor($session->booked_status_color);
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
        $this->redirect(ActivityReservationResource::getUrl('index', [
            'filters[date][value]=' => $info->record->id,
        ]));
    }
}
