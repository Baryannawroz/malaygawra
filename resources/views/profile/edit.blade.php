<x-app-layout>
    <x-page-header title="پرۆفایل" subtitle="زانیاریی هەژمار و وشەی نهێنی" />

    <div class="mg-card">
        <div class="mg-card-body" style="max-width:640px">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <div class="mg-card">
        <div class="mg-card-body" style="max-width:640px">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <div class="mg-card">
        <div class="mg-card-body" style="max-width:640px">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>
