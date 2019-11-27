<?php

use App\Collection;
use Illuminate\Http\Request;
use App\Http\Resources\Book as BookResource;
use App\Http\Resources\Collection as CollectionResource;

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

Route::post('/collection/books/tags', 'BookController@addTag');
Route::delete('/collection/books/tags', 'BookController@removeTag');

Route::post('/collection/books', 'CollectionController@addBook');
Route::delete('/collection/books/{bookId}', 'CollectionController@removeBook');

Route::get('/collections',  function() {
    $collections = Collection::all();

    return CollectionResource::collection($collections);
});

Route::post('/collection/{book}', 'CollectionController@processSort');
