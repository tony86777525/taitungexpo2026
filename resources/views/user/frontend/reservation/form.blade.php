<form id="reservation" action="" class="form form--reservation">
	<div class="form__body">
		<div class="wrap">
			<div class="container">
				{{-- 預約日期（必選） --}}
				<div class="formRow is-necessary">
					<div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.date.title') }}</span></div>
					<div class="formRow__element">
						<div class="formElement formElement--datepicker">
							<input id="datepicker" class="fancyInput fancyInput--datepicker f-h6" readonly placeholder="{{ __('reservation.form.date.placeholder') }}">
						</div>
					</div>
					<div class="formRow__hint">
						<div class="errMsg f-h6">{{ __('reservation.form.date.errMsg') }}</div>
					</div>
				</div>
				{{-- 展區（必選） --}}
				<div class="formRow is-necessary">
					<div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.zone.title') }}</span></div>
					<div class="formRow__element">
						<div class="formElement formElement--select">
							<select id="sel-zone" class="fancySelect">
								<option value="" disabled selected>{{ __('reservation.form.zone.placeholder') }}</option>
								<option value="A">A 舊站特區</option>
								<option value="B">B 就藝會區</option>
								<option value="C">C 美術館區</option>
								<option value="D">D 北町區</option>
								<option value="E">E 臨海區</option>
								<option value="F">F 美學館區</option>
								<option value="G">G 總圖區</option>
								<option value="H">H 衛星展區</option>
							</select>
						</div>
					</div>
					<div class="formRow__hint">
						<div class="errMsg f-h6">{{ __('reservation.form.zone.errMsg') }}</div>
					</div>
				</div>
				{{-- 預約場館（必選） --}}
				<div class="formRow is-necessary">
					<div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.venue.title') }}</span></div>
					<div class="formRow__element formElement--select">
						<div class="formElement formElement--select">
							<select id="sel-venue" class="fancySelect">
								<option value="" disabled selected>{{ __('reservation.form.venue.placeholder') }}</option>
							</select>
						</div>
					</div>
					<div class="formRow__hint">
						<div class="errMsg f-h6">{{ __('reservation.form.venue.errMsg') }}</div>
					</div>
				</div>
				{{-- 預約時段（必選） --}}
				<div class="formRow is-necessary">
					<div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.time.title') }}</span></div>
					<div class="formRow__element">
						<div class="formElement formElement--select">
							<select id="sel-time" class="fancySelect">
								<option value="" disabled selected>{{ __('reservation.form.time.placeholder') }}</option>
							</select>
						</div>
					</div>
					<div class="formRow__hint">
						<div class="errMsg f-h6">{{ __('reservation.form.time.errMsg') }}</div>
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
							<input type="text" id="name" class="fancyInput fancyInput--text f-h6" placeholder="{{ __('reservation.form.name.placeholder') }}" >
						</div>
						<div class="radioGroup radioGroup--gender">
							<input type="radio" id="gender-mr" name="gender" class="fancyInput fancyInput--radio" value="mr" checked>
							<label for="gender-mr" class="fancyLabel"><span class="fancyLabel__text f-p">{{ __('reservation.form.name.gender.male') }}</span></label>
							<input type="radio" id="gender-ms" name="gender" class="fancyInput fancyInput--radio" value="ms">
							<label for="gender-ms" class="fancyLabel"><span class="fancyLabel__text f-p">{{ __('reservation.form.name.gender.female') }}</span></label>
						</div>
					</div>
					<div class="formRow__hint">
						<div class="errMsg f-h6">{{ __('reservation.form.name.errMsg') }}</div>
					</div>
				</div>
				{{-- 聯絡電話（必填） --}}
				<div class="formRow is-necessary">
					<div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.tel.title') }}</span></div>
					<div class="formRow__element">
						<div class="formElement">
							<input type="tel" id="phone" class="fancyInput fancyInput--text f-h6" placeholder="{{ __('reservation.form.tel.placeholder') }}">
						</div>
					</div>
					<div class="formRow__hint">
						<div class="errMsg f-h6">{{ __('reservation.form.tel.errMsg') }}</div>
					</div>
				</div>
				{{-- 電子郵件（必填） --}}
				{{-- 電子郵件必須檢查格式是否為mail --}}
				<div class="formRow is-necessary">
					<div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.email.title') }}</span></div>
					<div class="formRow__element">
						<div class="formElement">
							<input type="email" id="email" class="fancyInput fancyInput--text f-h6 js-mailInput" placeholder="{{ __('reservation.form.email.placeholder') }}">
						</div>
					</div>
					<div class="formRow__hint">
						<div class="mailValid js-mailValid is-valid" data-valid-text="{{ __('reservation.form.email.valid.true') }}"  data-invalid-text="{{ __('reservation.form.email.valid.false') }}">
							<span class="f-h6 js-mailValid-text"></span>
						</div>
						<div class="errMsg f-h6">{{ __('reservation.form.email.errMsg') }}</div>
					</div>
				</div>
				{{-- 預約團體名稱（必填） --}}
				<div class="formRow is-necessary">
					<div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.org.title') }}</span></div>
					<div class="formRow__element">
						<div class="formElement">
							<input type="text" id="org" class="fancyInput fancyInput--text f-h6" placeholder="{{ __('reservation.form.org.placeholder') }}">
						</div>
					</div>
					<div class="formRow__hint">
						<div class="errMsg f-h6">{{ __('reservation.form.org.errMsg') }}</div>
					</div>
				</div>
				{{-- 預計參加人數（必選） --}}
				<div class="formRow is-necessary">
					<div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.count.title') }}</span></div>
					<div class="formRow__element">
						<div class="formElement formElement--select">
							<select id="sel-count" class="fancySelect">
								<option value="" disabled selected>{{ __('reservation.form.count.placeholder') }}</option>
								<option>10人以下</option>
								<option>11–20人</option>
								<option>21–30人</option>
								<option>31–50人</option>
								<option>51人以上</option>
							</select>
						</div>
					</div>
					<div class="formRow__hint">
						<div class="errMsg f-h6">{{ __('reservation.form.count.errMsg') }}</div>
					</div>
				</div>
				{{-- 備註（選填） --}}
				<div class="formRow">
					<div class="formRow__title f-p"><span class="text f-p">{{ __('reservation.form.remark.title') }}</span></div>
					<div class="formRow__element">
						<div class="formElement">
							<textarea id="remark" rows="4" class="fancyTextarea f-h6" placeholder="{{ __('reservation.form.remark.placeholder') }}"></textarea>
						</div>
					</div>
				</div>
				<div class="formRow formRow--end">
					<div class="formRow__element">
						<p class="paragraph f-p">{{ __('reservation.form.hint') }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form__foot">
		<div class="container">
			<div class="notice">
				<div class="notice__title f-p">{{ __('reservation.form.notices.title') }}</div>
				<div class="notice__content">
					<div class="notiGroup">
						<div class="notiGroup__title f-h5">{{ __('reservation.form.notices.content.reminders.title') }}</div>
						<ul class="notiGroup__list">
							<li><span class="f-h5">{{ __('reservation.form.notices.content.reminders.lists.list-item1') }}</span></li>
							<li><span class="f-h5">{{ __('reservation.form.notices.content.reminders.lists.list-item2') }}</span></li>
							<li><span class="f-h5">{{ __('reservation.form.notices.content.reminders.lists.list-item3') }}</span></li>
						</ul>
					</div>
					<div class="notiGroup">
						<div class="notiGroup__title f-h5">{{ __('reservation.form.notices.content.adjustments.title') }}</div>
						<ul class="notiGroup__list">
							<li><span class="f-h5">{{ __('reservation.form.notices.content.adjustments.lists.list-item1') }}</span></li>
							<li><span class="f-h5">{{ __('reservation.form.notices.content.adjustments.lists.list-item2') }}</span></li>
						</ul>
					</div>
					<div class="notiGroup">
						<div class="notiGroup__title f-h5">{{ __('reservation.form.notices.content.other.title') }}</div>
						<ul class="notiGroup__list">
							<li><span class="f-h5">{{ __('reservation.form.notices.content.other.lists.list-item1') }}</span></li>
							<li><span class="f-h5">{{ __('reservation.form.notices.content.other.lists.list-item2') }}</span></li>
						</ul>
					</div>
				</div>
				
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
</form>