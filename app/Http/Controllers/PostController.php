<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('id','DESC' )->paginate('15');
        return view('admin.posts.index',compact('posts'));
    }

    public function create()
    {
        $productos = Product::get();
        return view('admin.posts.create',
            compact('productos')
        );
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:posts|max:60',
            'cliente_id'=>'required|integer',
            'productos_id'=>'required|integer',

        ]);

        $post = new Post();
        $post->cliente_id = e($request->cliente_id);
        $post->productos_id = e($request->productos_id);
        $post->name = e($request->name);
        $post->slug = Str::slug($request->name);

        $post->save();

        return redirect()->route('posts.index')->with('info','Agregado correctamente');

    }
    public function show($id)
    {
        $post = Post::where('id',$id)->with('category','user','image','comments','comments.user')
            ->firstOrFail();

        return view('admin.posts.show',compact('post','category'));

    }
    public function edit($id)
    {
        $post = Post::where('id',$id)->firstOrFail();
        $categories = Category::where('module',1)->orderBy('name','ASC')->pluck('name','id');
        return view('admin.posts.edit',
            compact('post','categories')
        );
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|max:60',
            'user_id'=>'required|integer',
            'category_id'=>'required|integer',
            'abstract'=>'required|max:500',
            'body'=>'required',
            'status'=>'required',
            'image'=> [
                'image',
                'dimensions:
                min_width=1200,max_width=1200,
                min_height=490,max_height=490',
                'mimes:jpeg,jpg,png'
            ]

        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nombre = time().$image->getClientOriginalName();
            $ruta = public_path().'/images';
            $image->move($ruta,$nombre);
            $urlimage['url'] = '/images/'.$nombre;
        }
        $post  = Post::findOrFail($id);
        $post->user_id =e($request->user_id);
        $post->category_id = e($request->category_id);
        $post->name = e($request->name);
        $post->slug = Str::slug($request->name);
        $post->abstract = e($request->abstract);
        $post->body = e($request->body);
        $post->status = e($request->status);

        if ($request->hasFile('image')) {
            $post->image()->delete();
        }
        $post->save();
        if ($request->hasFile('image')) {
            $post->image()->create($urlimage);
        }


        return redirect()
            ->route('posts.index')
            ->with('info','Actualizado correctamente');
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id)->delete();
        return back()
            ->with('info','Borrado con exíto');

    }
}
