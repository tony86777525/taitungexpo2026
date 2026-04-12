<form id="reservation" action="" class="form">
	<div class="form__body">
		<div class="container">
			{{-- 預約日期（必選） --}}
			<div class="formRow is-necessary">
				<div class="formRow__title"><span class="text">預約日期</span></div>
				<div class="formRow__element">
					<input id="datepicker" class="datepickerItem datepickerItem--input" readonly data-toggle="datepicker">
				</div>
				<div class="formRow__hint">
					<div class="errMsg"></div>
				</div>
			</div>
			{{-- 展區（必選） --}}
			<div class="formRow is-necessary">
				<div class="formRow__title"><span class="text">展區</span></div>
				<div class="formRow__element">
					<select id="sel-zone">
						<option value="" disabled selected></option>
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
				<div class="formRow__hint">
					<div class="errMsg"></div>
				</div>
			</div>
			{{-- 預約場館（必選） --}}
			<div class="formRow is-necessary">
				<div class="formRow__title"><span class="text">預約場館</span></div>
				<div class="formRow__element">
					<select id="sel-venue">
						<option value="" disabled selected></option>
					</select>
				</div>
				<div class="formRow__hint">
					<div class="errMsg"></div>
					<div class="notice">
						<span class="notice__mark">*</span>
						<span class="notice__text">本場次團體導覽建議人數為OO人</span>
					</div>
				</div>
			</div>
			{{-- 預約時段（必選） --}}
			<div class="formRow is-necessary">
				<div class="formRow__title"><span class="text">預約時段</span></div>
				<div class="formRow__element">                                
					<select id="sel-time">
						<option value="" disabled selected></option>
					</select>
				</div>
				<div class="formRow__hint">
					<div class="errMsg"></div>
				</div>
			</div>
			<hr>
			{{-- 聯絡人姓名（必填） --}}
			<div class="formRow is-necessary">
				<div class="formRow__title"><span class="text">聯絡人姓名</span></div>
				<div class="formRow__element">
					<input type="text" id="name" placeholder="">
					<div class="radio-group">
						<label><input type="radio" name="gender" value="mr" checked> 先生</label>
						<label><input type="radio" name="gender" value="ms"> 小姐</label>
					</div>
				</div>
				<div class="formRow__hint">
					<div class="errMsg"></div>
				</div>
			</div>
			{{-- 聯絡電話（必填） --}}
			<div class="formRow is-necessary">
				<div class="formRow__title"><span class="text">聯絡電話</span></div>
				<div class="formRow__element">
					<input type="tel" id="phone" placeholder="">
				</div>
				<div class="formRow__hint">
					<div class="errMsg"></div>
				</div>
			</div>
			{{-- 電子郵件（必填） --}}
			<div class="formRow is-necessary">
				<div class="formRow__title"><span class="text">電子郵件</span></div>
				<div class="formRow__element">
					<input type="email" id="email" placeholder="">
				</div>
				<div class="formRow__hint">
					<div class="valid"></div>
					<div class="errMsg"></div>
				</div>
			</div>
			{{-- 預約團體名稱（必填） --}}
			<div class="formRow is-necessary">
				<div class="formRow__title"><span class="text">預約團體名稱</span></div>
				<div class="formRow__element">
					<input type="text" id="org" placeholder="">
				</div>
				<div class="formRow__hint">
					<div class="errMsg"></div>
				</div>
			</div>
			{{-- 預計參加人數（必選） --}}
			<div class="formRow is-necessary">
				<div class="formRow__title"><span class="text">預計參加人數</span></div>
				<div class="formRow__element">
					<select id="sel-count">
						<option value="" disabled selected></option>
						<option>10人以下</option>
						<option>11–20人</option>
						<option>21–30人</option>
						<option>31–50人</option>
						<option>51人以上</option>
					</select>
				</div>
				<div class="formRow__hint">
					<div class="errMsg"></div>
				</div>
			</div>
			{{-- 備註（選填） --}}
			<div class="formRow">
				<div class="formRow__title"><span class="text">備註（選填）</span></div>
				<div class="formRow__element">
					<textarea id="remark" rows="4"></textarea>
				</div>
				<div class="formRow__hint">
					<div class="errMsg"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="form__foot">
		<div class="container">
			<div class="notice">
				<div class="notice___title">注意事項：</div>
				<ul class="notice__list">
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</div>
			<div class="captcha">
				
			</div>
			<ul class="form__action">
				<li><button type="submit" class="btn btn--submit"><span class="btn__text">提交申請</span></button></li>
			</ul>
		</div>
	</div>
	
</form>