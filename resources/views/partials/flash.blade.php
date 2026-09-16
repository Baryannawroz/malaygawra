@if (session('success'))
<div class="mg-alert mg-alert-success" role="status" x-data="{ show: true }" x-show="show">
    <i class="bi bi-check-circle-fill"></i>
    <div>{{ session('success') }}</div>
    <button type="button" class="mg-alert-close" @click="show = false" aria-label="داخستن">&times;</button>
</div>
@endif

@if (session('error'))
<div class="mg-alert mg-alert-danger" role="alert">
    <i class="bi bi-exclamation-triangle-fill"></i>
    <div>{{ session('error') }}</div>
</div>
@endif

@if ($errors->any())
<div class="mg-alert mg-alert-danger" role="alert">
    <i class="bi bi-exclamation-triangle-fill"></i>
    <div>
        <strong>تکایە ئەم هەڵانە چاک بکەرەوە:</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
