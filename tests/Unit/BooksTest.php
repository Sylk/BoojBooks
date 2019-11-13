<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BooksTest extends TestCase
{
//    NOTE: This test might be redundant but we can fix that in a bit
    public function test_book_comes_back_with_expected_parameters()
    {
        // create a book

        // fetch the book, and check every parameter...
    }

    public function test_book_is_created()
    {
        // mock a call to the api for a new book with some faker data

        // Check to see that the book was created
    }

    public function test_books_can_be_removed()
    {
        // make a call to the api for a new book with some faker data

        // then attempt to SLAUGHTER it by hitting the endpoint to destroy it
        // NOTE: Perhaps we can chain the created and removed together with some phpunit funkyness
    }

    public function test_books_can_be_reordered()
    {
        // create a collection of books

        // mock a call to the api to re-order the books

        // Check to see that the new order is enforced
    }

    public function test_books_can_be_sorted()
    {
        // create a collection of books

        // mock a call to the api to sort the differently

        // Check to see that the new order is enforced
    }

}
