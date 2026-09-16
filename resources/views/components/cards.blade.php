@php
    $groupsCount = \App\Models\Group::count();
@endphp
<div class="mg-stats">
    <div class="mg-card mg-stat">
        <div class="mg-stat-icon tone-blue"><i class="bi bi-people"></i></div>
        <div>
            <div class="mg-stat-value">{{ number_format($students) }}</div>
            <div class="mg-stat-label">قوتابی</div>
        </div>
    </div>
    <div class="mg-card mg-stat">
        <div class="mg-stat-icon tone-green"><i class="bi bi-person-badge"></i></div>
        <div>
            <div class="mg-stat-value">{{ number_format($teachers) }}</div>
            <div class="mg-stat-label">مامۆستا</div>
        </div>
    </div>
    <div class="mg-card mg-stat">
        <div class="mg-stat-icon tone-amber"><i class="bi bi-journal-bookmark"></i></div>
        <div>
            <div class="mg-stat-value">{{ number_format($groupsCount) }}</div>
            <div class="mg-stat-label">دەرس</div>
        </div>
    </div>
    <div class="mg-card mg-stat">
        <div class="mg-stat-icon tone-rose"><i class="bi bi-layers"></i></div>
        <div>
            <div class="mg-stat-value">{{ number_format($lessons) }}</div>
            <div class="mg-stat-label">ئاستی وانە</div>
        </div>
    </div>
</div>
