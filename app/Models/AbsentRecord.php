<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsentRecord extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $table = 'absent_records';
    public function student(){
        return $this->belongsTo(Students::class);
    }
}
