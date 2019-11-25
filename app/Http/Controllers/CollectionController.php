<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Collection;

class CollectionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collection = $request->collection;
        $collection = Collection::create(['name' => $collection]);

        return response()->json(
            $collection
        ,201);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sort(Request $request)
    {

        $book = Book::find(2);

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
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $collection = Collection::find($id);
        $collection->delete();

        return response()->json(204);
    }

    public function addBook(Request $request) {

        $book = Book::find($request->bookId);
        $collection = Collection::find($request->collectionId);

        $book->collections()->attach($request->collectionId);

        // save the new order or the collection with the books name


        return response()->json($book,201);
    }

    public function removeBook(Request $request) {
        $book = Book::find($request->book);
        $book->collections()->detach($request->collectionId);

        return response()->json(204);
    }
}
