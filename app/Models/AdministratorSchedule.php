<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministratorSchedule extends Model
{
    use HasFactory;
    protected $fillable = ['teacher_id', 'day_of_week'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
