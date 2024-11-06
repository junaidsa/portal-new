<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Levels extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = [];

    public function classType()
{
    return $this->belongsTo(ClassType::class, 'class_type_id');
}
    public function branch()
{
    return $this->belongsTo(Branches::class, 'branch_id');
}
public function subject()
    {
        return $this->hasOne(Subjects::class,'');
    }
}
