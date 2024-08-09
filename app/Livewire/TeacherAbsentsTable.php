<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TeacherAbsent;
use Illuminate\Support\Facades\DB;

class TeacherAbsentsTable extends Component
{
    use WithPagination;

    public $sortBy = 'teacher_id';
    public $sortDirection = 'asc';
    public $from;
    public $to;

    public function render()
    {
        $query = TeacherAbsent::query()
            ->select(
                'teacher_id',
                DB::raw('SUM(CASE WHEN isAbsent = 0 THEN 1 ELSE 0 END) AS present_count'),
                DB::raw('SUM(CASE WHEN isAbsent = 1 THEN 1 ELSE 0 END) AS absent_count'),
                DB::raw('SUM(CASE WHEN isAbsent = 2 THEN 1 ELSE 0 END) AS permission_count')
            )
            ->groupBy('teacher_id');
      
        if ($this->from) {
            $query->whereDate('date', '>=', $this->from);
        }

        if ($this->to) {
            $query->whereDate('date', '<=', $this->to);
        }

        $absents = $query->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);

        return view('livewire.teacher-absents-table', ['absents' => $absents]);
    }

    public function sortByPresentCount()
    {
        $this->sortBy = 'present_count';
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }
    public function sortByTeacher()
    {
        $this->sortBy = 'teacher_id';
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function sortByAbsentCount()
    {
        $this->sortBy = 'absent_count';
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function sortByPermissionCount()
    {
        $this->sortBy = 'permission_count';
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }
}
