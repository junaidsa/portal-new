<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = [];

    public function level()
    {
        return $this->belongsTo(Levels::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }
    public function student()
    {
        return $this->belongsTo(User::class);
    }

}
