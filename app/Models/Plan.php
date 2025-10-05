<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{

    protected $fillable = [
        'name',
        'price',
        'billing_cycle',
        'type',
        'max_members',
        'duration_days',
    ];
     public function users()
    {
        return $this->hasMany(User::class);
    }

    public function payments()
{
    return $this->hasMany(Payment::class);
}
}
