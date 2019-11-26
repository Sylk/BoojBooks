<?php

namespace Tests\Unit;

use App\Book;
use Faker\Factory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BooksTest extends TestCase
{
    use WithFaker;

//    NOTE: This test might be redundant but we can fix that in a bit
    public function test_book_comes_back_with_expected_parameters()
    {
        // create a book

        // fetch the book, and check every parameter...
    }

    public function test_book_is_created()
    {

        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'])->json('POST', 'api/collection/books', ['title' => 'merlin', 'author' => 'Arthur Pendragon']);

        var_dump($response);
//        dd('blar');

//        $response = $this->withHeaders([])->json('POST', '/api/collection/books', ['name' => $this->faker->sentence(3, true)]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);

//        dd($response);
    }

    public function test_books_can_be_removed()
    {
        $book = Factory(Book::class)->make();

        $response = $this->withHeaders([])->json('DELETE', '/api/collection/books', ['id' => $book->id]);

//        $response
//            ->assertStatus(204)

        dd($response);
    }

}
