<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{

    protected $fillable = [

        'name',
        'type',
        'price',
        'limit',
        'duration',
        'status',
        'description'

    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
