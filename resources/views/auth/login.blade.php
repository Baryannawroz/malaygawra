<x-guest-layout>
    <h1 style="font-size:20px;margin-bottom:4px">چوونەژوورەوە</h1>
    <p class="mg-muted" style="margin-bottom:18px;font-size:14px">بۆ بەردەوامبوون ئیمەیڵ و وشەی نهێنی بنووسە.</p>

    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="mg-stack">
        @csrf

        <div class="mg-field">
            <x-input-label for="email" value="ئیمەیڵ" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                autocomplete="username" dir="ltr" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="mg-field" x-data="{ show: false }">
            <div style="display:flex;justify-content:space-between;align-items:center">
                <x-input-label for="password" value="وشەی نهێنی" />
                @if (Route::has('password.request'))
                <a class="mg-link" style="font-size:13px" href="{{ route('password.request') }}">وشەی نهێنیت لەبیرچووە؟</a>
                @endif
            </div>
            <div style="position:relative">
                <input id="password" name="password" :type="show ? 'text' : 'password'" type="password" class="mg-input"
                    required autocomplete="current-password" dir="ltr" style="padding-left:44px">
                <button type="button" class="mg-btn mg-btn-ghost mg-btn-icon" @click="show = !show" data-no-lock
                    style="position:absolute;left:4px;top:4px" :aria-label="show ? 'شاردنەوەی وشەی نهێنی' : 'پیشاندانی وشەی نهێنی'">
                    <i class="bi" :class="show ? 'bi-eye-slash' : 'bi-eye'"></i>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <label for="remember_me" style="display:flex;align-items:center;gap:8px;font-size:14px;cursor:pointer">
            <input id="remember_me" type="checkbox" name="remember" style="width:16px;height:16px">
            <span>لەبیرم بێت</span>
        </label>

        <button type="submit" class="mg-btn mg-btn-primary" style="width:100%">چوونەژوورەوە</button>
    </form>
</x-guest-layout>
