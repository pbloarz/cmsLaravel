<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name'
    ];
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at','update_at'];

    public function subCategories(){
        return $this->hasMany(Subcategory::class );
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

}
