<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('id','DESC' )->paginate('15');
        return view('admin.tags.index',compact('tags'));
    }

    public function create()
    {
        $categories = Category::orderBy('name','DESC')
            ->pluck('name','id');

        return view('admin.tags.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:tags|max:20',

        ]);
        $tags = new Tag;
        $tags->name = e($request->name);
        $tags->category_id = e($request->category_id);
        $tags->slug = Str::slug($request->name);
        $tags->save();
        return redirect()->route('tags.index')->with('info','Agregado correctamente');

    }

    public function show($id)
    {
    }
    public function module($module)
    {
        $tags = Tag::where('module',$module)
            ->orderBy('id','DESC' )
            ->paginate('15');

        return view('admin.tags.index',
            compact('tags')
        );
    }
    public function edit($id)
    {
        $tag = Tag::where('id',$id)->firstOrFail();
        $category = Category::orderBy('name','ASC')->pluck('name',id);

        return view('admin.tags.edit',compact('tag','category'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|max:20',

        ]);

        $tags  = Tag::findOrFail($id);
        $tags->name = e($request->name);
        $tags->category_id = e($request->category_id);
        $tags->slug = e($request->slug);
        $tags->save();

        return redirect()->route('tags.index')->with('info','Actualizado correctamente');
    }
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id)->delete();
        return redirect()->route('tags.index')->with('danger','Eliminado con exíto');

    }
}
