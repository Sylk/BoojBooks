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

    public function tagBook(Request $request) {
//        dd($request);
        $book = Book::find($request->book);
        $book->attachTag($request->collectionName);

        // Select all of the taggables and then proceed to make sure that the order is correct
        // so that we can place the (we can skip this if we keep track of this during deletes)
        // I'm an idiot for trying to commit to this.
//        $tags = DB::select('select * from taggables where tag_id = :id', ['id' => $request->collectionId]);
//        $tagsOrder = [];
//
//        foreach($tags as $tag) {
//            array_push($tagsOrder, $tag->order);
//        }

//            DB::update('UPDATE taggables SET order VALUE :order WHERE tag_id = :id AND taggable_id = :taggable_id',
//                ['order' => max($tagsOrder)+1, 'id' => $request->collectionId, 'taggable_id' => $book->id]);

        return response()->json(201);
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
