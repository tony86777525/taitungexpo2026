<div class="cardItem cardItem--event" data-filter-target="event">
    <div class="cardWrap">
        <div class="cardItem__image">
            <img src="https://picsum.photos/id/236/580/435" alt="縣府辦理《冠軍之路》電影欣賞 預告2026台東博覽會：紅土之上棒球特展">
        </div>
        <div class="cardItem__text">
            <div class="time">{{ $activity->display_time_range }}</div>
            @if($activity->getProjectTypes()->isNotEmpty())
                <div class="type">
                    @foreach($activity->getProjectTypes() as $projectTypes)
                        <span>{{ $projectTypes->display_name }}</span>
                    @endforeach
                </div>
            @endif
            <div class="title f-h4">{{ $activity->display_title }}/{{ $activity->display_project_name }}</div>
            <ul class="natures">
                @foreach($activity->getNatures() as $nature)
                    <li>{{ $nature->display_name }}</li>
                @endforeach
            </ul>
            <ul class="links">
                @if(!empty($activity->display_activity_location))
                    <li class="f-h5">
                        @if(!empty($activity->display_map_link))
                            <a href="{{ $activity->display_map_link }}" class="map">{{ $activity->display_activity_location }}</a>
                        @else
                            <span class="map">{{ $activity->display_activity_location }}</span>
                        @endif
                    </li>
                @endif
                @if(!empty($activity->canBookAnySession()))
                    <li class="f-h5">需報名預約<a href="#" class="reserveLink" target="_blank"><span class="reserveLink__text">預約</span></a></li>
                @else
                    <li class="f-h5">自由參加</li>
                @endif
            </ul>
        </div>
    </div>
    <ul class="cardItem__action">
        <li>
            <a href="{{ route('user.event.detail', ['id' => $activity->id]) }}" class="btn btn--goDetail" target="_blank"><span class="btn__text">READ MORE</span></a>
        </li>
    </ul>
</div>
