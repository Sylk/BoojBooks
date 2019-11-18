<?php

use Illuminate\Http\Request;
use App\Http\Resources\Book as BookResource;
use App\Http\Resources\Tag as TagResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/books', function() {
    $books = App\Book::all();

    return BookResource::collection($books);
});
Route::post('/books', 'BookController@store');

Route::delete('/books/{book}', 'BookController@destroy');
Route::patch('/books/{book}', 'BookController@ediit');

Route::post('/collection/books', 'BookController@tagBook');

Route::get('/collections',  function() {
    $books = \Spatie\Tags\Tag::all();
    return TagResource::collection($books);
});
Route::post('/collections', 'TagController@store');
Route::delete('/collections/{collection}', 'TagController@destroy');

Route::patch('/collection/{book}', 'TagController@sort');
