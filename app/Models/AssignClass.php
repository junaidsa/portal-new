<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignClass extends Model
{
    use HasFactory;
    protected $fillable = ['teacher_id', 'schedule_timing_id','status','class_fee'];  
    public function teacher()
    {
        return $this->belongsTo(User::class);
    }
    public function schedule_timing()
    {
        return $this->belongsTo(ScheduleTiming::class,'schedule_timing_id','id');
    }
}
