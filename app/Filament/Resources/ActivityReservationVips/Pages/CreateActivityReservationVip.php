<?php

namespace App\Filament\Resources\ActivityReservationVips\Pages;

use App\Enums\ActivityReservationStatus;
use App\Filament\Resources\ActivityReservationVips\ActivityReservationVipResource;
use App\Models\ActivitySessionVip;
use App\Services\MailService;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateActivityReservationVip extends CreateRecord
{
    protected static string $resource = ActivityReservationVipResource::class;

    protected function afterCreate(): void
    {
        if ($this->record->status === ActivityReservationStatus::CONFIRMED) {
            $this->record->load([
                'activitySession',
                'activitySession.project',
                'activitySession.project.zone',
            ]);

            MailService::SendMailInternalActivityReservationVip($this->record);
            MailService::SendMailExternalActivityReservationVip($this->record);
        }
    }

    // 在 CreateResource 頁面檔案中
    protected function handleRecordCreation(array $data): Model
    {
        // 1. 此時 $data 可能真的沒資料，我們需要從 Form 中直接抓取原始狀態
        $formData = $this->form->getRawState();

        // 2. 透過 DB Transaction 確保安全
        return \DB::transaction(function () use ($formData) {

            // 3. 手動建立 ActivitySession
            $session = ActivitySessionVip::create($formData['activitySession']);

            // 4. 建立主預約紀錄並關聯 ID
            return \App\Models\ActivityReservation::create([
                ...collect($formData)->except(['activitySession'])->toArray(),
                'activity_session_id' => $session->id,
            ]);
        });
    }
}
