<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subjects extends Model
{
    use HasFactory , softDeletes;
    public function branch()
    {
        return $this->belongsTo(Branches::class);
    }
    public function tuition()
    {
        return $this->belongsTo(Tuitions::class);
    }



}
