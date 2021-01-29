<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id','DESC' )->paginate('15');
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categories|max:20',

        ]);
        $subcategory = new Category();

        $subcategory->name = e($request->name);

        $subcategory->save();
        return redirect()->route('categories.index')->with('info','Actualizado correctamente');

    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $category = Category::where('id',$id)->firstOrFail();
        return view('admin.categories.edit',compact('category'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|max:20',

        ]);


        $category  = Category;
        $category->name = e($request->name);
        $category->module = e($request->module);

        $category->save();

        return redirect()->route('categories.index')->with('info','Actualizado correctamente');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id)->delete();
        return redirect()->route('categories.index')->with('danger','Eliminado con exíto');

    }
}
