<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'name',
        'phone',
        'mobile',
        'address',
        'gender',
        'job',
        'for_program',
        'password',
        'dob',
        'user_date',
        'user_time',
        'created_by',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'for_program' => 'boolean',
        'dob' => 'date',
        'user_date' => 'date',
        'user_time' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // المستخدم الذي أنشأ هذا المستخدم
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // المستخدمين الذين أنشأهم هذا المستخدم
    public function createdUsers()
    {
        return $this->hasMany(User::class, 'created_by');
    }
}
