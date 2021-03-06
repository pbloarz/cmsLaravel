<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','category_id','slug',
    ];
    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at','update_at'];
    public function Category(){
        return $this->belongsTo(Category::class);
    }

}
