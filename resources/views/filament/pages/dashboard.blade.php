@vite('resources/css/app.css')
<x-filament-panels::page>
<div class="min-h-screen bg-gray-100 p-6 text-sm">
    <h1 class="mb-6 text-center text-xl font-bold border-b pb-2">2026 台東博覽會 | 團體導覽管理系統</h1>

    <div class="grid grid-cols-6 gap-0 border border-gray-300 bg-white mb-6 text-center shadow-sm">
        <div class="border-r border-gray-300 p-2">
            <p class="bg-gray-100 font-bold border-b -m-2 mb-2 p-1">今日團體數</p>
            <p class="text-lg font-bold">4</p>
        </div>
        <div class="border-r border-gray-300 p-2">
            <p class="bg-gray-100 font-bold border-b -m-2 mb-2 p-1">待審核</p>
            <p class="text-lg font-bold text-red-600">2</p>
        </div>
        <div class="border-r border-gray-300 p-2">
            <p class="bg-gray-100 font-bold border-b -m-2 mb-2 p-1">已核准</p>
            <p class="text-lg font-bold">12</p>
        </div>
        <div class="border-r border-gray-300 p-2">
            <p class="bg-gray-100 font-bold border-b -m-2 mb-2 p-1">已取消</p>
            <p class="text-lg font-bold">1</p>
        </div>
        <div class="border-r border-gray-300 p-2">
            <p class="bg-gray-100 font-bold border-b -m-2 mb-2 p-1">參訪總人次</p>
            <p class="text-lg font-bold">100</p>
        </div>
        <div class="p-2">
            <p class="bg-gray-100 font-bold border-b -m-2 mb-2 p-1">今日內部貴賓使用狀態</p>
            <div class="flex justify-around">
                <span>已使用 <strong class="text-blue-600">3</strong> 組</span>
                <span>未使用 <strong class="text-gray-400">7</strong> 組</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-6">

        <div class="border border-gray-300 bg-white shadow-sm overflow-hidden flex flex-col">
            <div class="bg-gray-200 p-2 font-bold text-center border-b border-gray-300">預約量總覽</div>
            <div class="flex gap-2 p-2 border-b bg-gray-50 text-xs">
                <button class="border px-2 py-1 bg-white">【選擇日期 ▾】</button>
                <button class="border px-2 py-1 bg-white">【選擇展區 ▾】</button>
                <button class="border px-2 py-1 bg-white">【選擇場館 ▾】</button>
            </div>
            <div class="overflow-y-auto h-80 p-4 space-y-6 h-full">
                <div>
                    <div class="flex justify-between font-bold mb-1">
                        <span>A1 台東博覽會主場館</span>
                        <span class="text-red-600">🔴 對外額滿 (保留名額存在)</span>
                    </div>
                    <p class="text-gray-500 text-xs mb-2">團體預約：3組 ｜ 內部貴賓：1組 (未使用)</p>
                    <div class="w-full bg-gray-200 h-6 relative">
                        <div class="bg-black h-full w-full"></div>
                        <div class="absolute inset-0 flex items-center justify-center text-xs"></div>
                    </div>
                </div>
                <hr>
                <div>
                    <div class="flex justify-between font-bold mb-1">
                        <span>A2 台東特有種</span>
                        <span class="text-yellow-600">🟡 接近滿載</span>
                    </div>
                    <p class="text-gray-500 text-xs mb-2">團體預約：2組 ｜ 內部貴賓：1組 (已指派)</p>
                    <div class="w-full bg-gray-200 h-6 relative">
                        <div class="bg-black h-full w-3/4"></div>
                        <div class="absolute inset-0 flex items-center justify-center text-xs"></div>
                    </div>
                </div>
                <hr>
                <div>
                    <div class="flex justify-between font-bold mb-1">
                        <span>A3 台東記憶提取所</span>
                        <span class="text-green-600">🟢 可預約</span>
                    </div>
                    <p class="text-gray-500 text-xs mb-2">團體預約：1組 ｜ 內部貴賓：1組 (未使用)</p>
                    <div class="w-full bg-gray-200 h-6 relative">
                        <div class="bg-black h-full w-1/3"></div>
                        <div class="absolute inset-0 flex items-center justify-center text-xs"></div>
                    </div>
                </div>
                <hr>
                <div>
                    <div class="flex justify-between font-bold mb-1">
                        <span>A4 ....</span>
                        <span class="text-green-600">🟢 可預約</span>
                    </div>
                    <p class="text-gray-500 text-xs mb-2">團體預約：1組 ｜ 內部貴賓：1組 (未使用)</p>
                    <div class="w-full bg-gray-200 h-6 relative">
                        <div class="bg-black h-full w-1/3"></div>
                        <div class="absolute inset-0 flex items-center justify-center text-xs"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="border border-gray-300 bg-white shadow-sm flex flex-col">
            <div class="bg-gray-200 p-2 font-bold text-center border-b border-gray-300">
                預約單筆審核頁 <p class="text-red-500 font-normal text-xs">(民眾填寫內容審核)</p>
            </div>
            <div class="p-4 flex-1 space-y-3">
                <p><strong>【預約編號 XXXX】</strong></p>
                <div class="grid grid-cols-2 gap-y-2">
                    <p>參訪日期：<span class="text-blue-600">2026/07/10 (二)</span></p>
                    <p>場館：<span class="text-blue-600">A1 台東博覽會主場館</span></p>
                    <p>時段：<span class="text-blue-600">15:00－15:30</span></p>
                    <p>預約人數：<span class="text-blue-600">32 人</span> <span class="text-xs text-green-600">(建議 25-40 ✅)</span></p>
                </div>
                <br>
                <div class="space-y-1">
                    <p>團體名稱：<strong>OOOO</strong></p>
                    <p>聯絡人：<strong>OOO 先生/小姐</strong></p>
                    <p>電話：<strong>09XX-XXX-XXX</strong></p>
                    <p>Email：<strong>xxx@email.com</strong></p>
                </div>
                <div class="bg-blue-50 p-2 border border-blue-100 text-xs space-y-1">
                    <p class="font-bold text-blue-800">【系統檢查】</p>
                    <p>✅ 人數符合大會團體導覽申請規範</p>
                    <p>✅ 無同日同館重複預約</p>
                </div>
                <p>備註：<span class="text-blue-600">校外教學參訪</span></p>
            </div>
            <div class="p-3 border-t flex justify-end gap-2 bg-gray-50">
                <button class="border border-gray-400 px-4 py-1 hover:bg-gray-200">[ 通過 ]</button>
                <button class="border border-gray-400 px-4 py-1 hover:bg-gray-200 text-red-600">[ 拒絕 ] (需填原因)</button>
                <button class="border border-gray-400 px-4 py-1 hover:bg-gray-200">[ 內部備註 ] (交接備註)</button>
            </div>
        </div>
    </div>

    {{ $this->getAllReservationsTable() }}
</div>
</x-filament-panels::page>
