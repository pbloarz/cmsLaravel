<?php

use Illuminate\Support\Facades\Route;

Route::resource('admin/categories','CategoryController')->names('categories');
Route::get('admin/category/{module}','CategoryController@module')->name('categories.module');
Route::resource('admin/subcategories','SubCategoryController')->names('subcategories');
Route::resource('admin/tags','TagController')->names('tags');
Route::resource('admin/posts','PostController')->names('posts');
Route::resource('admin/products','ProductController')->names('products');

/** Rutas para post */
Route::post('/comment/store','CommentController@store')->name('comment.add');
Route::post('/reply/store','CommentController@replyStore')->name('reply.add');
Route::delete('/reply/destroy/{comment}','CommentController@destroy')->name('comment.destroy');
Route::get('/reply/{comment}/edit','CommentController@edit')->name('comment.edit');
Route::put('reply/{comment}','CommentController@update')->name('comment.update');

/** Routes for products*/
Route::post('/productComment/store','CommentController@productStore')->name('productComment.add');
Route::post('/productReply/store','CommentController@productReplyStore')->name('productReply.add');


//Route::get('/', function () {
//    return view('web.index');
//});


//Rutas para los usuarios
Route::get('/','WebController@index')->name('web.index');
Route::get('/no-encontrado','WebController@notFount')->name('web.notFount');
Route::get('/blog','WebController@blog')->name('web.blog');
Route::get('/blog/{slug}','WebController@blogDetails')->name('web.blogDetails');

Route::get('/subcategorias/{slug}','WebController@category')->name('web.category');
Route::get('/etiqueta/{tag}','WebController@tags')->name('web.tags');
Route::get('/checkout','WebController@checkout')->name('web.checkout');
Route::get('/contacto','WebController@contact')->name('web.contact');
Route::get('/producto{slug}','WebController@detail')->name('web.detail');
Route::get('/preguntas-fecuentes','WebController@fag')->name('web.fag');
Route::get('/lista-de-deseos','WebController@myWishlist')->name('web.myWishlist');
Route::get('/comparacion-de-productos','WebController@productComparison')->name('web.productComparison');
Route::get('/carrito-de-compras','WebController@shoppingCart')->name('web.shoppingCart');
Route::get('/registrarse','WebController@singIn')->name('web.singIn');
Route::get('/terminos-y-condiciones','WebController@termsConditions')->name('web.termsConditions');
Route::get('/rastrea-tu-orden','WebController@trackOrders')->name('web.trackOrders');


//carousel
Route::resource('admin/carousels','CarouselController')->names('carousels');

//redes sociales
Route::resource('admin/socials','SocialController')->names('socials');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
