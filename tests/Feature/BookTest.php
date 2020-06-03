<?php

namespace Tests\Feature;

use App\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
     use RefreshDatabase;

    /**
     * @test
     */
    public function books_can_be_browse()
    {
        $response = $this->get('/api/book');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function a_book_can_be_added_to_library()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/api/book', [
            'name' => 'Planet apes',
            'author' => 'Guill'
        ]);

        $this->assertCount(1, Book::all());
    }

    /**
     * @test
     */
    public function a_book_can_be_seen()
    {
        $book = factory('App\Book')->create();

        $response = $this->get('/api/book/' . $book->id);

        $response->assertSee($book->name);

        $response->assertSee($book->author);

        $response->assertStatus(200);
    }

}
