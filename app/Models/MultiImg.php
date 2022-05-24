<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImg extends Model
{
    protected $dates = ['deleted_at'];
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
