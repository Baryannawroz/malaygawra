<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{

    use HasFactory;
    protected $table = 'students';
    protected $guarded=[];
    public function School(){
        return $this->belongsTo(School::class);
    }
    public function Street(){
        return $this->belongsTo(Street::class);
    }
    public function gender(){
return $this->gender==1 ?"نێر":"مێ";
    }
    public function marital(){
return $this->marital_status==1 ?"خێزاندار":"سەڵت";
    }
}
