<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    use HasFactory;

    protected $fillable = ['brand_name','brand_slug','brand_image'];
}
