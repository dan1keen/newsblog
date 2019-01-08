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



Route::get('/news', 'NewsController@news');
Route::get('/news/{id}', 'NewsController@show');
Route::get('/form', 'NewsController@create');
Route::resource('shares', 'NewsController');
Route::get('/edit/{id}', 'NewsController@edit');

Auth::routes();



Route::group(['middleware' =>['web','auth']], function() {
    Route::get('/', function(){
        return redirect('/home');
    });

    Route::get('/news', function (){
        if(Auth::user()->admin == 0) {
          $news = \App\News::orderBy('created_at', 'desc')->paginate(5);
          return view('news', compact('news'));
        }else{
            $news = \App\News::orderBy('created_at', 'desc')->paginate(5);
            return view('adminNews', compact('news'));
        }
        $news = \App\News::paginate(5);
        return view('news', compact('news'));
    });

    Route::get('/home', function () {
        if(Auth::user()->admin == 0){
            return view('/home');
        }else{
            $users = \App\User::all();
            return view('/admin', compact('users'));
        }

    });
});
