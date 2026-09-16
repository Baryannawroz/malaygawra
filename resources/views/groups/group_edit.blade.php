<x-app-layout>
    <x-page-header title="دەستکاریکردنی دەرس" :subtitle="$group->name" :back="route('groups')" back-label="لیستی دەرسەکان" />

    <form action="{{ route('group.update', $group->id) }}" method="POST" class="mg-card" style="max-width:760px">
        @csrf
        <div class="mg-card-body">
            @include('groups._form', ['group' => $group])
        </div>
        <div class="mg-card-footer mg-form-actions">
            <button type="submit" class="mg-btn mg-btn-primary"><i class="bi bi-check-lg"></i> پاشەکەوتکردنی گۆڕانکاری</button>
            <a href="{{ route('groups') }}" class="mg-btn mg-btn-secondary">هەڵوەشاندنەوە</a>
        </div>
    </form>
</x-app-layout>
