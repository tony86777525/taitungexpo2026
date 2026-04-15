<?php

namespace App\Filament\Resources\ActivityReservationNormals\Pages;

use App\Enums\ActivityReservationStatus;
use App\Enums\ActivityReservationType;
use App\Filament\Resources\ActivityReservations\ActivityReservationResource;
use App\Models\ActivityReservationNormal;
use App\Services\MailService;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Mail;

class ApproveActivityReservationNormal extends EditRecord
{
    protected static string $resource = ActivityReservationResource::class;

    protected static ?string $title = '【一般】審核預約';

    protected function resolveRecord(int | string $key): Model
    {
        return ActivityReservationNormal::findOrFail($key);
    }

    public function getBreadcrumbs(): array
    {
        return [
            url('/admin') => 'Dashboard',
            $this->getTitle(),
        ];
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('activitySessionNormal.display_option')
                    ->label('團體導覽預約場次')
//                    ->relationship(
//                        name: 'activitySessionVip',
//                        modifyQueryUsing: fn (Builder $query) => $query
//                            ->with([
//                                'project',
//                                'project.zone',
//                            ])
//                            ->withCount([
//                                'bookedActivityReservations',
//                            ])
//                    )
                    ->getStateUsing(function ($record) {
                        $record->load([
                            'activitySessionNormal',
                            'activitySessionNormal.project',
                            'activitySessionNormal.project.zone',
                        ]);

                        return $record->activitySessionNormal->display_option_title ?? '-';
                    }),
                TextInput::make('contact_name')
                    ->label('聯絡人')
                    ->formatStateUsing(function ($record) {
                        return $record->display_contact_dear_name;
                    })
                    ->disabled(),
                TextInput::make('contact_phone')
                    ->label('聯絡電話')
                    ->disabled(),
                TextInput::make('contact_email')
                    ->label('電子郵件')
                    ->disabled(),
                TextInput::make('contact_group_name')
                    ->label('預約團體名稱')
                    ->disabled(),
                TextInput::make('participants_quota')
                    ->label('預計參與人數')
                    ->disabled(),
                Textarea::make('notes')
                    ->label('備註（選填）')
                    ->disabled(),
                Textarea::make('status_notes')
                    ->label('未通過原因（選填）'),
                Select::make('status')
                    ->label('狀態')
                    ->options(ActivityReservationStatus::options())
                    ->disabled(),
            ])
            ->columns(1);
    }

    protected function getFormActions(): array
    {
        if ($this->record->status === ActivityReservationStatus::PENDING) {
            return [
                Action::make('approve')
                    ->label('通過')
                    ->color('success')
                    ->action('approve'),
                Action::make('reject')
                    ->label('不通過')
                    ->color('danger')
                    ->action('reject'),
            ];
        } else {
            return [];
        }
    }

    public function approve(): void
    {
        $formData = $this->form->getState();
        // 稍後實現
        $this->record->status = ActivityReservationStatus::CONFIRMED;
        $this->record->status_notes = $formData['status_notes'] ?? null;
        $this->record->save();

        $this->sendMailApprove();

        Notification::make()
            ->title('預約已核准')
            ->success()
            ->send();

        $this->redirect(url('/admin'));
    }

    public function reject(): void
    {
        $formData = $this->form->getState();
        // 稍後實現
        $this->record->status = ActivityReservationStatus::CANCELLED;
        $this->record->status_notes = $formData['status_notes'] ?? null;
        $this->record->save();

        $this->sendMailReject();

        Notification::make()
            ->title('預約已拒絕')
            ->success()
            ->send();

        $this->redirect(url('/admin'));
    }


    public function sendMailApprove(): void
    {
        $this->record->load([
            'activitySession',
            'activitySession',
            'activitySession.project',
            'activitySession.project.zone',
        ]);

        MailService::SendMailWhenApproveActivityReservationNormal($this->record);
    }

    public function sendMailReject(): void
    {
        $this->record->load([
            'activitySession',
            'activitySession',
            'activitySession.project',
            'activitySession.project.zone',
        ]);

        MailService::SendMailWhenRejectActivityReservationNormal($this->record);
    }
}
