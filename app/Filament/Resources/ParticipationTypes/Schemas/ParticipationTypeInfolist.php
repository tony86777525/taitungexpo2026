<?php

namespace App\Filament\Resources\ParticipationTypes\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ParticipationTypeInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name_tw')
                    ->label('報名資訊（中）')
                    ->placeholder('-'),
                TextEntry::make('name_en')
                    ->label('報名資訊（英）')
                    ->placeholder('-'),
                TextEntry::make('link_name_tw')
                    ->label('報名連結文字（中）')
                    ->placeholder('-'),
                TextEntry::make('link_name_en')
                    ->label('報名連結文字（英）')
                    ->placeholder('-'),
                IconEntry::make('is_active')
                    ->label('啟用狀態')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->label('建立時間')
                    ->dateTime('Y年m月d日 H:i:s')
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('最後更新時間')
                    ->dateTime('Y年m月d日 H:i:s')
                    ->placeholder('-'),
            ]);
    }
}
