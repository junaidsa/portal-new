<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'parent_name',
        'data_of_birth',
        'city',
        'cnic',
        'phone_number',
        'address',
        'subject',
        'level',
        'timing',
        'date',
        'payment_information',
        'role_description',
        'note',
        'profile_pic',
        'class_type',
        'role',
        'branch_id',
        'deleted_at',
        'qualifications',
        'availability',
        'experience',
        'resume',
        'status',
        'password',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $appends = ['subject'];
    protected $casts = [
        'subject' => 'string',
    ];
    public function branch()
{
    return $this->belongsTo(Branches::class);
}
public function subjects()
{
    return $this->belongsToMany(Subjects::class, 'subjects');
}
public function getSubjectAttribute($value)
{
    return  (!empty($value)) ? json_decode($value) : null ;
}
}
