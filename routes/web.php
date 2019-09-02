<?php


use App\Book;
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


Route::group(['middleware' => ['web']], function () {
    Route::get('/', ['middleware' => 'auth',function(){
        $books = Book::all();
        return view('books',[
            'books' => $books
        ]);
    }]);

    
    Route::resource('contents', 'ContentsController');
    Route::get('contents/new', 'ContentsController@create');
    Route::post('/book','ContentsController@store');
    Route::get('contents/{id}/show', 'ContentsController@show');
    Route::get('contents/{id}/update', 'ContentsController@edit');
    Route::post('/book/{book}', 'ContentsController@update');

    Route::delete('/book/{book}', ['middleware' => 'auth',function(Book $book){
        $book->delete();

        return redirect('/');
    }]);
    
    Route::auth();
});
