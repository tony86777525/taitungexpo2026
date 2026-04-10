<?php

namespace App\Filament\Resources\ActivitySessionNormals\Pages;

use App\Filament\Resources\ActivitySessionNormals\ActivitySessionNormalResource;
use App\Filament\Resources\ActivitySessionNormals\Schemas\ActivitySessionNormalBatchForm;
use App\Models\ActivitySessionNormal;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Resources\Pages\CreateRecord;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateBatchActivitySessionNormal extends CreateRecord
{
    protected static string $resource = ActivitySessionNormalResource::class;

    protected static ?string $title = '批次建立 【一般】團體導覽預約場次';

    // 關鍵：覆蓋資源預設的 form，改用自定義的 Schema 類別
    public function form(Schema $schema): Schema
    {
        return ActivitySessionNormalBatchForm::configure($schema);
    }

    /**
     * 因為是批次新增，需要自定義儲存邏輯
     * 預設的 CreateRecord 會嘗試儲存單一 Model，這裡我們要拆解 Repeater 數據
     */
    protected function handleRecordCreation(array $data): Model
    {
        $startDate = $data['start_date'];
        $endDate = $data['end_date'];
        $timeSlots = $data['time_slots'] ?? [];
        $defaultRecord = collect($data)->except(['start_date', 'end_date', 'time_slots', 'excluded_dates']);

        // 建立日期區間迭代器
        $periodDates = CarbonPeriod::create($startDate, $endDate);
        $excludedDates = array_column($data['excluded_dates'], 'excluded_dates') ?? [];
        $excludedDays = $data['excluded_days'] ?? [];

        $periodDates->filter(function (Carbon $date) use ($excludedDays, $excludedDates) {
            // 排除星期 (Saturday, Sunday)
            if (in_array($date->dayOfWeekIso, $excludedDays)) {
                return false;
            }

            // 排除特定日
            if (!empty($excludedDates) && in_array($date->toDateString(), $excludedDates)) {
                return false;
            }
            return true;
        });

        // 開始批次寫入
        DB::transaction(function () use ($periodDates, $timeSlots, $defaultRecord) {
            foreach ($periodDates as $date) {
                $dateString = $date->format('Y-m-d');

                foreach ($timeSlots as $slot) {
                    $record = $defaultRecord;
                    $record['date'] = $dateString;
                    $record['start_time'] = $slot['start_time'];
                    $record['end_time'] = $slot['end_time'];
                    $record['created_at'] = Carbon::now();
                    $record['updated_at'] = Carbon::now();

                    $records[] = $record->toArray();
                }
            }

            if (!empty($records)) {
                DB::table('activity_sessions')->insert($records);
            }
        });

        // 返回最後一筆紀錄（Filament 規範要求）
        return new ActivitySessionNormal();
    }

    protected function getRedirectUrl(): string
    {
        // 跳轉到列表頁 (Index)
        return $this->getResource()::getUrl('index');
    }
}
