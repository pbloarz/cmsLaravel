<?php

namespace App\Http\ViewComposer;


 use App\Category;
 use App\Product;
 use Illuminate\Contracts\View\View;
 class CategoriesComposer
 {
 public function  compose(View $view)
    {
        $categorias = Category::with('subcategories','image')->get();

        $view->with([
            'categorias' => $categorias,
        ]);
    }
}
