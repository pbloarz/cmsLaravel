<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function eliminarimagen($id){
        $image= Image::find($id);
        $archivo= substr($image->url,1);
        $eliminar = File::delete($archivo);
        $image->delete();
        return "Eliminar id".$id. '' .$eliminar;

    }
}
