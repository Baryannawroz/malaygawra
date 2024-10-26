<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function street(){
        return $this->belongsTo(Street::class,'street_id');
    }
    public function gender()
    {
        return $this->gender == 1 ? "نێر" : "مێ";
    }
    public function marital()
    {
        return $this->marital_status == 1 ? "خێزاندار" : "سەڵت";
    }
  
}
