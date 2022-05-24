<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SubCategory extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    use HasFactory;

    protected $fillable = ['category_id','subcategory_name','subcategory_slug'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function subsubcategory(){
        return $this->hasMany('App\Models\SubSubCategory');
    }
}
