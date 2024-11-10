<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Monolog\Level;

class Subjects extends Model
{
    use HasFactory , softDeletes;
    public function branch()
    {
        return $this->belongsTo(Branches::class);
    }
    public function level()
    {
        return $this->belongsTo(Levels::class,'levels_id','id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }


}
