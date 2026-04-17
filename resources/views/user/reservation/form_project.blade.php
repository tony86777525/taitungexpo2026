<form id="reservation" action="{{ route('user.reservation.store') }}" method="POST" class="form form--reservation">
    @csrf
    <input type="hidden" id="activity_session_id" name="activity_session_id" value="{{ old('activity_session_id') }}">
    <div class="form__body">
        <div class="wrap">
            <div class="container">
                {{-- 展區（必選） --}}
                <div class="formRow is-necessary">
                    <div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.zone.title') }}</span></div>
                    <div class="formRow__element">
                        <div class="formElement formElement--select">
                            <select id="sel-zone" class="fancySelect" disabled readonly>
                                @foreach($zoneOptions as $zoneOption)
                                    <option value="{{ $zoneOption['value'] }}" @if($zoneOption['value'] === $currentProject->zone->id) selected @endif>{{ $zoneOption['label'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                {{-- 預約場館（必選） --}}
                <div class="formRow is-necessary">
                    <div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.venue.title') }}</span></div>
                    <div class="formRow__element formElement--select">
                        <div class="formElement formElement--select">
                            <select id="sel-venue" class="fancySelect" disabled readonly>
                                @foreach($projectOptions as $projectOption)
                                    <option value="{{ $projectOption['value'] }}" @if($projectOption['value'] === $currentProject->id) selected @endif>{{ $projectOption['label'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                {{-- 預約日期（必選） --}}
                <div class="formRow is-necessary">
                    <div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.date.title') }}</span></div>
                    <div class="formRow__element">
                        <div class="formElement formElement--datepicker">
                            <input id="datepicker" name="date" class="fancyInput fancyInput--datepicker f-h6" value="{{ old('date') }}" readonly>
                        </div>
                    </div>
                </div>
                {{-- 預約時段（必選） --}}
                <div class="formRow is-necessary">
                    <div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.time.title') }}</span></div>
                    <div class="formRow__element">
                        <div class="formElement formElement--select">
                            <select id="sel-time" name="time_range" class="fancySelect">
                                <option value="" selected></option>
                                @foreach($sessionTimeOptions as $sessionTimeOption)
                                    <option value="{{ $sessionTimeOption['value'] }}">{{ $sessionTimeOption['label'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                {{-- 預約日期、展區、預約場館、預約時段都選擇過以後，.js-capacity-wrap要加上.is-active的樣式才會display: block --}}
                <div class="formRow formRow--capacity js-capacity-wrap">
                    <div class="formRow__element">
                        <div class="capacity">
                            <span class="capacity__deco">*</span>
                            <div class="capacity__text f-h5">{{ __('reservation.form.capacity.before') }}<span class="js-capacity-count">__</span>{{ __('reservation.form.capacity.after') }}</div>
                        </div>
                    </div>
                </div>
                <hr>
                {{-- 聯絡人姓名（必填） --}}
                <div class="formRow is-necessary">
                    <div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.name.title') }}</span></div>
                    <div class="formRow__element">
                        <div class="formElement">
                            <input type="text" id="name" name="contact_name" class="fancyInput fancyInput--text f-h6" value="{{ old('contact_name') }}" placeholder="" >
                        </div>
                        <div class="radioGroup radioGroup--gender">
                            <input
                                type="radio"
                                id="gender-mr"
                                name="contact_sex"
                                class="fancyInput fancyInput--radio"
                                value="{{ \App\Enums\ContactSex::MAN->value }}"
                                {{ empty(old('contact_sex')) || old('contact_sex') === \App\Enums\ContactSex::MAN->value ? 'checked' : '' }}
                            >
                            <label for="gender-mr" class="fancyLabel"><span class="fancyLabel__text f-p">{{ __('reservation.form.name.gender.male') }}</span></label>
                            <input
                                type="radio"
                                id="gender-ms"
                                name="contact_sex"
                                class="fancyInput fancyInput--radio"
                                value="{{ \App\Enums\ContactSex::WOMAN->value }}"
                                {{ old('contact_sex') === \App\Enums\ContactSex::WOMAN->value ? 'checked' : '' }}
                            >
                            <label for="gender-ms" class="fancyLabel"><span class="fancyLabel__text f-p">{{ __('reservation.form.name.gender.female') }}</span></label>
                        </div>
                    </div>
                    @error('contact_name')
                        <div class="formRow__hint">
                            <div class="errMsg f-h6">{{ $message }}</div>
                        </div>
                    @enderror
                    @error('contact_sex')
                        <div class="formRow__hint">
                            <div class="errMsg f-h6">{{ $message }}</div>
                        </div>
                    @enderror
                </div>
                {{-- 聯絡電話（必填） --}}
                <div class="formRow is-necessary">
                    <div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.tel.title') }}</span></div>
                    <div class="formRow__element">
                        <div class="formElement">
                            <input type="tel" id="phone" name="contact_phone" class="fancyInput fancyInput--text f-h6" value="{{ old('contact_phone') }}" placeholder="">
                        </div>
                    </div>
                    @error('contact_phone')
                        <div class="formRow__hint">
                            <div class="errMsg f-h6">{{ $message }}</div>
                        </div>
                    @enderror
                </div>
                {{-- 電子郵件（必填） --}}
                {{-- 電子郵件必須檢查格式是否為mail --}}
                <div class="formRow is-necessary">
                    <div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.email.title') }}</span></div>
                    <div class="formRow__element">
                        <div class="formElement">
                            <input type="email" id="email" name="contact_email" class="fancyInput fancyInput--text f-h6 js-mailInput" value="{{ old('contact_email') }}" placeholder="">
                        </div>
                    </div>
                    @error('contact_email')
                        <div class="formRow__hint">
                            <div class="errMsg f-h6">{{ $message }}</div>
                        </div>
                    @enderror
                </div>
                {{-- 預約團體名稱（必填） --}}
                <div class="formRow is-necessary">
                    <div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.org.title') }}</span></div>
                    <div class="formRow__element">
                        <div class="formElement">
                            <input type="text" id="org" name="contact_group_name" class="fancyInput fancyInput--text f-h6" value="{{ old('contact_group_name') }}" placeholder="">
                        </div>
                    </div>
                    @error('contact_group_name')
                        <div class="formRow__hint">
                            <div class="errMsg f-h6">{{ $message }}</div>
                        </div>
                    @enderror
                </div>
                {{-- 預計參加人數（必選） --}}
                <div class="formRow is-necessary">
                    <div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.count.title') }}</span></div>
                    <div class="formRow__element">
                        <div class="formElement formElement--select">
                            <select id="sel-count" name="participants_quota" class="fancySelect">
                                <option value="" disabled selected></option>
                            </select>
                        </div>
                    </div>
                    @error('participants_quota')
                        <div class="formRow__hint">
                            <div class="errMsg f-h6">{{ $message }}</div>
                        </div>
                    @enderror
                </div>
                {{-- 備註（選填） --}}
                <div class="formRow">
                    <div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.remark.title') }}</span></div>
                    <div class="formRow__element">
                        <div class="formElement">
                            <textarea id="remark" name="status_notes" rows="4" class="fancyTextarea f-h6">{{ old('status_notes') }}</textarea>
                        </div>
                    </div>
                </div>
                @error('status_notes')
                    <div class="formRow__hint">
                        <div class="errMsg f-h6">{{ $message }}</div>
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form__foot">
        <div class="container">
            <div class="notice">
                <div class="notice__title">{{ __('reservation.form.notices.title') }}</div>
                <ul class="notice__list f-p">
                    <li><span class="f-h5">{{ __('reservation.form.notices.lists.list-item1') }}</span></li>
                    <li><span class="f-h5">{{ __('reservation.form.notices.lists.list-item2') }}</span></li>
                    <li><span class="f-h5">{{ __('reservation.form.notices.lists.list-item3') }}</span></li>
                    <li><span class="f-h5">{{ __('reservation.form.notices.lists.list-item4') }}</span></li>
                    <li><span class="f-h5">{{ __('reservation.form.notices.lists.list-item5') }}</span></li>
                    <li><span class="f-h5">{{ __('reservation.form.notices.lists.list-item6') }}</span></li>
                    <li><span class="f-h5">{{ __('reservation.form.notices.lists.list-item7') }}</span></li>
                </ul>
            </div>
            <div class="captcha">
                <div class="captcha__image">
                    <div class="img"><img src="https://picsum.photos/id/236/143/40" class="js-captcha-image"></div>
                    <div class="refresh"><button class="btn btn--refresh js-captcha-image">refresh captcha</button></div>
                </div>
                <div class="captcha__input">
                    <input type="text" class="fancyInput fancyInput--captcha f-h6 js-captch-input" placeholder="{{ __('reservation.form.captcha.placeholder') }}">
                </div>
            </div>
            <ul class="actions">
                <li><button id="submit" type="submit" class="btn btn--submit is-dark"><span class="btn__text">{{ __('reservation.form.actions.submit') }}</span></button></li>
            </ul>
        </div>
    </div>

    <script>
        window.canBookActivitySessions = @json($canBookActivitySessions);
        window.sessionDateOptions = @json($sessionDateOptions);
        window.zoneOptions = @json($zoneOptions);
        window.projectOptions = @json($projectOptions);
        window.sessionTimeOptions = @json($sessionTimeOptions);

        window.oldInput = @json(old() ?? null);
    </script>
</form>
