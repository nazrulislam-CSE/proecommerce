<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function BlogPostCategory(){
        return $this->belongsTo('App\Models\BlogPostCategory');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
