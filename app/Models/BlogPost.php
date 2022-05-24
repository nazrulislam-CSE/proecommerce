<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function BlogCategory(){
        return $this->belongsTo('App\Models\BlogCategory');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
