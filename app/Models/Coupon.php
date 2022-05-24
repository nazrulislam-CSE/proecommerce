<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
   
    protected $dates = ['deleted_at'];
    use HasFactory;

    protected $guarded = [];
}
