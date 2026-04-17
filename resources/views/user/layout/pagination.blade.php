@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="pagination__item pagination__item--prev is-disabled"><span class="text">PREV</span></li>
        @else
            <li class="pagination__item pagination__item--prev"><a href="{{ $paginator->previousPageUrl() }}#list" class="text">PREV</a></li>
        @endif

        @php
            $currentPage = $paginator->currentPage();
            $lastPage = $paginator->lastPage();
            $side = 1; // 左右各顯示 1 頁
        @endphp

        {{-- Pagination Elements --}}
        {{-- 第一頁 --}}
        @if($currentPage > ($side + 2))
            <li class="pagination__item pagination__item--num"><a href="{{ $paginator->url(1) }}#list" class="text">1</a></li>
            <li class="pagination__item pagination__item--ellipsis"><span class="text"></span></li>
        @else
            @for($i = 1; $i < min($currentPage - $side, $lastPage); $i++)
                <li class="pagination__item pagination__item--num"><a href="{{ $paginator->url($i) }}#list" class="text">{{ $i }}</a></li>
            @endfor
        @endif

        {{-- 中間當前頁區域 (左側 + 當前 + 右側) --}}
        @for($i = max(1, $currentPage - $side); $i <= min($lastPage, $currentPage + $side); $i++)
            @if($i == $currentPage)
                <li class="pagination__item pagination__item--num is-current"><span class="text">{{ $i }}</span></li>
            @else
                <li class="pagination__item pagination__item--num"><a href="{{ $paginator->url($i) }}#list" class="text">{{ $i }}</a></li>
            @endif
        @endfor

        {{-- 最後一頁 --}}
        @if($currentPage < ($lastPage - $side - 1))
            <li class="pagination__item pagination__item--ellipsis"><span class="text"></span></li>
            <li class="pagination__item pagination__item--num"><a href="{{ $paginator->url($lastPage) }}#list" class="text">{{ $lastPage }}</a></li>
        @else
            @for($i = max($currentPage + $side + 1, 1); $i <= $lastPage; $i++)
                <li class="pagination__item pagination__item--num"><a href="{{ $paginator->url($i) }}#list" class="text">{{ $i }}</a></li>
            @endfor
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="pagination__item pagination__item--next"><a href="{{ $paginator->nextPageUrl() }}#list" class="text">NEXT</a></li>
        @else
            <li class="pagination__item pagination__item--next is-disabled"><span class="text">NEXT</span></li>
        @endif
    </ul>
@endif
