<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookCollection;
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
    public function processSort(Request $request)
    {
        if($collection = Collection::find($request->originId)) {
            $collection->sort($request->type, $collection->id, $request->destinationId);
        } else {
            return response()->json(403);
        }
        return response()->json(200);
    }

    public function addBook(Request $request)
    {
        $collection =  new Collection;
        if($collection = $collection->addBook($request->bookId)) {
            return response()->json($collection,201);
        }

        return response()->json(['message' => 'This book has already been added.'],403);
    }

    public function removeBook($bookId) {
        $collection =  new Collection;
//        dd($request->attributes);
        if($collection->removeBook($bookId)) {
            return response()->json(['message' => 'Book deleted from collection.'],204);
        }

        return response()->json(['message' => 'Book not deleted.'], 403);
    }
}
