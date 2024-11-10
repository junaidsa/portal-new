<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScheduleTiming extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = [];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id','id');
    }
    public function student()
    {
        return $this->belongsTo(User::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }
    public function classType()
    {
        return $this->belongsTo(ClassType::class);
    }

}
