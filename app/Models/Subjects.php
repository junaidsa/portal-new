<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subjects extends Model
{
    use HasFactory , softDeletes;
    // protected static function booted()
    // {
    //     static::addGlobalScope(new AuthScope);

    // }


}
