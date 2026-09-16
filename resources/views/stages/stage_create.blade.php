<x-app-layout>
    <x-page-header title="زیادکردنی قۆناغ" :back="route('stages')" back-label="قۆناغەکان" />

    <form action="{{ route('stage.store') }}" method="POST" class="mg-card" style="max-width:760px">
        @csrf
        <div class="mg-card-body">
            @include('stages._form', ['stage' => null])
        </div>
        <div class="mg-card-footer mg-form-actions">
            <button type="submit" class="mg-btn mg-btn-primary"><i class="bi bi-check-lg"></i> پاشەکەوتکردن</button>
            <a href="{{ route('stages') }}" class="mg-btn mg-btn-secondary">هەڵوەشاندنەوە</a>
        </div>
    </form>
</x-app-layout>
