@push('scripts')
    <script src="{{ asset('vendor/captcha/js/captcha.js') }}"></script>
@endpush

@php
    $type = $type ?? config('captcha.default', 'image');
    $difficulty = $difficulty ?? config('captcha.difficulty', 'medium');
    $style = $style ?? config('captcha.style', 'default');
    $id = $id ?? 'captcha-' . uniqid();
@endphp

<div class="captcha captcha-container captcha-style-{{ $style }}" id="{{ $id }}" data-type="{{ $type }}" data-difficulty="{{ $difficulty }}">
    <div class="captcha-image-wrapper">
        <div class="captcha__image captcha-image-container">
            <div class="img">
                <img
                    src="{{ route('captcha.image', ['type' => 'image', 'difficulty' => $difficulty]) }}"
                    alt="Captcha Image"
                    class="captcha-image"
                    id="{{ $id }}-image"
                >
            </div>
            <div class="refresh">
                <button
                    type="button"
                    class="captcha-refresh btn btn--refresh"
                    onclick="refreshCaptcha('{{ $id }}')"
                    title="{{ __('Refresh captcha') }}"
                ></button>
            </div>
        </div>
        <div class="captcha-input-group captcha__input">
            <input
                type="text"
                id="{{ $id }}-input"
                name="captcha"
                class="captcha-input fancyInput fancyInput--captcha f-h6"
                placeholder="{{ __('reservation.form.captcha.placeholder') }}"
                autocomplete="off"
            >
        </div>
        @error('captcha')
            <div class="captcha__hint is-active">
                <div class="errMsg f-h6">{{ $message }}</div>
            </div>
        @enderror
    </div>
</div>

