<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Support extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'user_id', 'branch_id', 'title', 'parent_id', 'is_progress', 'status', 'remarks', 'created_at', 'updated_at'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function parent() {
        return $this->hasMany(Support::class,'parent_id','id');
    }
}
