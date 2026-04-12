<x-filament-panels::page>
    <style>
        /* 僅在此頁面生效的 CSS */
        .ec-day-grid .ec-event-body {
            flex-direction: column !important;
        }
        /* 隱藏 TimeGrid 的 Body 部分，只保留 Header/All-Day 部分 */
        .ec-body {
            display: none !important;
        }
    </style>
    @if (!auth()->user()->hasRole('private_sector_project_system_admin'))
        @php
            list(
                $todayGroupCount,
                $pendingCount,
                $confirmedCount,
                $cancelledCount,
                $joinCount,
                $bookedVipCount,
                $unbookedVipCount
            ) = $this->getBookedInfo();
        @endphp

        <div class="min-h-screen bg-gray-100 p-6 text-sm">

            <h1 class="mb-6 text-center text-xl font-bold border-b pb-2">2026 台東博覽會 | 團體導覽管理系統</h1>

            <div class="grid grid-cols-6 gap-0 border border-gray-300 bg-white mb-6 text-center shadow-sm">
                <div class="border-r border-gray-300 p-2">
                    <p class="bg-gray-100 font-bold border-b -m-2 mb-2 p-1">今日團體數</p>
                    <p class="text-lg font-bold">{{ $todayGroupCount }}</p>
                </div>
                <div class="border-r border-gray-300 p-2">
                    <p class="bg-gray-100 font-bold border-b -m-2 mb-2 p-1">待審核</p>
                    <p class="text-lg font-bold text-red-600">{{ $pendingCount }}</p>
                </div>
                <div class="border-r border-gray-300 p-2">
                    <p class="bg-gray-100 font-bold border-b -m-2 mb-2 p-1">已核准</p>
                    <p class="text-lg font-bold">{{ $confirmedCount }}</p>
                </div>
                <div class="border-r border-gray-300 p-2">
                    <p class="bg-gray-100 font-bold border-b -m-2 mb-2 p-1">已取消</p>
                    <p class="text-lg font-bold">{{ $cancelledCount }}</p>
                </div>
                <div class="border-r border-gray-300 p-2">
                    <p class="bg-gray-100 font-bold border-b -m-2 mb-2 p-1">參訪總人次</p>
                    <p class="text-lg font-bold">{{ $joinCount }}</p>
                </div>
                <div class="p-2">
                    <p class="bg-gray-100 font-bold border-b -m-2 mb-2 p-1">今日內部貴賓使用狀態</p>
                    <div class="flex justify-around">
                        <span>已使用 <strong class="text-blue-600">{{ $bookedVipCount }}</strong> 組</span>
                        <span>未使用 <strong class="text-gray-400">{{ $unbookedVipCount }}</strong> 組</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 mb-6">
                @livewire(\App\Filament\Resources\ActivitySessions\Widgets\ActivitySessionCalendar::class)
            </div>

            {{ $this->table }}
        </div>
    @endif
</x-filament-panels::page>
