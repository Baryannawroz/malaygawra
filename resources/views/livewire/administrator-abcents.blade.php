<div>
    @include('livewire._staff-attendance', [
        'action' => route('administratorAbsent.store'),
        'scheduleUrl' => route('administrator.Schedules'),
    ])
</div>
