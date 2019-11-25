<?php

namespace App\Http\Controllers;

use App\Book;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Tags\Tag;

class BookController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book;
//        NOTE: There is a smoother way to do this, have to look it up though.
        $book->title = $request->title;
        $book->author = $request->author;

        $factoryBook = Factory(Book::class)->make();

        $book->edition = $factoryBook->edition;
        $book->length = $factoryBook->length;
        $book->score = $factoryBook->score;
        $book->cover = $factoryBook->cover;
        $book->file = $factoryBook->file;
        $book->published_date = $factoryBook->published_date;

        $book->save();

        return response()->json($book,201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function addTag(Request $request) {
        $book = Book::find($request->book);
        $book->attachTag($request->collectionName);

        return response()->json($book,201);
    }

    public function removeTag(Request $request) {
        $book = Book::find($request->book);
        $book->detatchTag($request->collectionName);

        return response()->json(204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();

        return response()->json(204);
    }
}
