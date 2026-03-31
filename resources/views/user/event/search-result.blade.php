@if ($activities->isNotEmpty())
    <div class="result__list">
        <div class="cardsList cardsList--column">
            @foreach ($activities as $activity)
                @include('user.event.card', ['activity' => $activity])
            @endforeach
        </div>
    </div>
@else
    <div class="result__hint f-p">本日無活動。</div>
@endif
