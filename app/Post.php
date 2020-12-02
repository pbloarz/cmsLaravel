<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'slug',
        'abstract',
        'body',
        'status',

    ];
    protected $dates = ['deleted_at'];

    public function image() {
        return $this->morphOne('App\image','imageable');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->morphMany(Comment::class,'commentable')
            ->whereNull('parent_id');
    }


}
