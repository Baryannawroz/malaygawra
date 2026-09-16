<div>
    @include('livewire._staff-attendance', [
        'action' => route('teacherAbsent.store'),
        'scheduleUrl' => route('teacher.Schedules'),
    ])
</div>
