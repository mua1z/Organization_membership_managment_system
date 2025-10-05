<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class payment extends Model
{

     use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'name',
        'organ_name',
        'amount',
        'payment_method',
        //'transaction_id',
        'status',
        'billing',

    ];






    public function user()
{
    return $this->belongsTo(User::class);
}

public function plan()
{
    return $this->belongsTo(Plan::class);
}
}
