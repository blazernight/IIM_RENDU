<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::resource('/article', 'ArticleController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/user', 'UserController@index');

Route::get('article/like/{id}', ['as' => 'article.like', 'uses' => 'LikeController@likeArticle']);

//routes pour le contact
Route::get('contact', 'ContactController@contact');
Route::post('contact', ['as'=>'contact.store','uses'=>'ContactController@contactPost']);
// Comments
Route::post('comments/{article_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);
//

//EXO1

/*Route::get('/iim', function() {
   return view('exo1.iim');
});


Route::get('/bonjour/{name}', function($name) {
    return view('exo1.bonjour', ['prenom' => $name]);
});

Route::get('/test', function() {
    $age = 15;

    $tasks = [
        'Faire le ménage',
        'Envoyer un mail'
    ];

    return view('exo1.test', compact('age', 'tasks'));
});

Route::get('/page1', function() {
    return view('exo1.page1');
});

Route::get('/page2', function() {
    return view('exo1.page2');
});*/
