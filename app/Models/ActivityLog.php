<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityLog extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'user_id',
        'action',
        'model',
        'branch_id',
        'model_id',
        'changes',
    ];
}
