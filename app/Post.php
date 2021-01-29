<?php

namespace App;

use http\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'cliente_id','productos_id','name','slug'

    ];
    protected $dates = ['deleted_at'];


    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function productos(){
        return $this->belongsTo(User::class);
    }



}
