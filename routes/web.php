<?php
use App\Article;
use Illuminate\Http\Request;
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

Route::get('/', function (Request $request) {
    $search = '';
    if(isset($request->search) && $request->search != '') {
        $search = $request->search;
        $articles = Article::listArticlesHomePage(3, $search);
    }
    else {
        $articles = Article::listArticlesHomePage(3);
        
    }
    
    
    return view('site', [
        "articles"=> $articles,
        "search"=> $search,
    ]);
})->name('home-page');
Route::get('/article/{id}/{title?}', function ($id, $title=null) { 
    $article = Article::find($id);
    if($article) {
        return view('article', [
            "article"=> $article
        ]);
    }
    else {
        redirect()->route('home-page');
    }
})->name('article');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('can:is-author');
Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function(){
    Route::resource('articles', 'ArticleController')->middleware('can:is-author');
    Route::resource('users', 'UserController')->middleware('can:is-admin');
    Route::resource('authors', 'AuthorController')->middleware('can:is-admin');
    Route::resource('admins', 'AdminController')->middleware('can:is-admin');
});