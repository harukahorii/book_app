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
    Route::get('/new', ['middleware' => 'auth',function(){
        return view('new',[
            // 'books' => $books
        ]);
    }]);
    // 多分ここのbookはpostした後の行き先
    Route::post('/book', ['middleware' => 'auth',function(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $book = new Book;
        $book->title = $request->name;
        $book->body = $request->body;
        $book->todo = $request->todo;
        $book->limit = $request->limit;
        $book->save();
        // 保存した後の行き先
        return redirect('/');
    }]);

    Route::resource('contents', 'ContentsController');

    Route::delete('/book/{book}', ['middleware' => 'auth',function(Book $book){
        $book->delete();

        return redirect('/');
    }]);
    
    Route::auth();
});
