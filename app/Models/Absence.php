<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function addAbsent($id, $students)
    {
        foreach ($students as $student) {
            $absence = new AbsentRecord();
            $absence->absence_id     = $id;
            $absence->student_id = $student['id'];
            $absence->isAbsent = $student['isAbsent'];
            $absence->save();
        }
    }
}
