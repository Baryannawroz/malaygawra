<x-app-layout>
    <x-page-header title="دەستکاریکردنی قۆناغ" :subtitle="$stage->name" :back="route('stages')" back-label="قۆناغەکان" />

    <form action="{{ route('stage.update', $stage->id) }}" method="POST" class="mg-card" style="max-width:760px">
        @csrf
        <div class="mg-card-body">
            @include('stages._form', ['stage' => $stage])
        </div>
        <div class="mg-card-footer mg-form-actions">
            <button type="submit" class="mg-btn mg-btn-primary"><i class="bi bi-check-lg"></i> پاشەکەوتکردنی گۆڕانکاری</button>
            <a href="{{ route('stages') }}" class="mg-btn mg-btn-secondary">هەڵوەشاندنەوە</a>
        </div>
    </form>
</x-app-layout>
