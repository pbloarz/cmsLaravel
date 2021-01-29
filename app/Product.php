<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'subcategory_id',
        'name',
        'slug',
        'stock',
       'actualPrice',
        'longDescription',

    ];
    protected $dates = ['deleted_at'];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function post(){
        return $this->hasMany(Post::class);
    }


}
