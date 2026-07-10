<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'email',
        'phone',
        'website',
        'address',
        'description',
        'logo',
        'status',
    ];

    public function job()
    {
        return $this->hasMany(Job::class);
    }
}
