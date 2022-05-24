<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MultiImg extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
