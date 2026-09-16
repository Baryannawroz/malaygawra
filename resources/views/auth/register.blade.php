<x-guest-layout>
    <h1 style="font-size:20px;margin-bottom:4px">دروستکردنی بەکارهێنەر</h1>
    <p class="mg-muted" style="margin-bottom:18px;font-size:14px">هەژمارێکی نوێ بۆ سیستەم دروست بکە.</p>

    <form method="POST" action="{{ route('register') }}" class="mg-stack">
        @csrf

        <div class="mg-field">
            <x-input-label for="name" value="ناو" />
            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <div class="mg-field">
            <x-input-label for="email" value="ئیمەیڵ" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" dir="ltr" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="mg-field">
            <x-input-label for="password" value="وشەی نهێنی" />
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password" dir="ltr" />
            <p class="mg-help">لانیکەم ٨ پیت.</p>
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="mg-field">
            <x-input-label for="password_confirmation" value="دووبارەکردنەوەی وشەی نهێنی" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                autocomplete="new-password" dir="ltr" />
            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <button type="submit" class="mg-btn mg-btn-primary" style="width:100%">دروستکردن</button>
        <p style="text-align:center;font-size:14px"><a class="mg-link" href="{{ route('login') }}">پێشتر هەژمارت هەیە؟ چوونەژوورەوە</a></p>
    </form>
</x-guest-layout>
