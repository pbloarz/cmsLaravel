<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable=['nombre','apellido','cliente'];

    public function postVenta(){
        $this->hasOne(Post::class);
    }

}
