<x-app-layout>
    <x-page-header title="دروستکردنی دەرس" :back="route('groups')" back-label="لیستی دەرسەکان" />

    <form action="{{ route('group.store') }}" method="POST" class="mg-card" style="max-width:760px">
        @csrf
        <div class="mg-card-body">
            @include('groups._form', ['group' => null])
        </div>
        <div class="mg-card-footer mg-form-actions">
            <button type="submit" class="mg-btn mg-btn-primary"><i class="bi bi-check-lg"></i> پاشەکەوتکردن</button>
            <a href="{{ route('groups') }}" class="mg-btn mg-btn-secondary">هەڵوەشاندنەوە</a>
        </div>
    </form>
</x-app-layout>
