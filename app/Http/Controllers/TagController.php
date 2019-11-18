<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class TagController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = $request->collection;
        Tag::create(['name' => $tag]);

        return response()->json(201);
    }

    /**
     * @param Request $request
     */
    public function sort(Request $request, $book)
    {
//        dd($request);
        $book = Book::find(2);
//dd($book);
        if ($request->sort == 'up') {
            $book->moveOrderUp();
        } elseif ($request->sort == 'down') {
            $book->moveOrderDown();
        } elseif ($request->sort == 'default') {
            Tags::setNewOrder($request->collection);
        }

        return response()->json(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {

        $tag = Tag::find($id);
        $tag->delete();

//        This can be optimized by just grabbing the location of the id and checking what order it has
//        and then only re-ordering every element above it

//        $tags = DB::select('select * from taggables where tag_id = :id', ['id' => $id]);
//        $tagsOrder = [];
//        $newTagsOrder = [];
//
//        $expectedLength = $tags.length;
//        $expectedNumbers = [];
//        for($i= 0; $i < $expectedLength; $i++) {
//            array_push($expectedNumbers, $i);
//        }
//
//        foreach($tags as $tag) {
//            array_push($tagsOrder, $tag->order);
//        }
//
//        asort($tagsOrder);
//
//        for($i= 0; $i < $expectedLength; $i++) {
//            array_push($expectedNumbers, $i);
//        }

        return response()->json(204);
    }
}
