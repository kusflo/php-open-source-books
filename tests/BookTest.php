<?php

namespace App\Tests;

use App\Application\Search\Book\SearchBookById;
use App\Application\Search\Book\SearchBooksByTitle;
use App\Domain\Book\Book;
use App\Domain\Book\BookAuthor;
use App\Domain\Book\BookDescription;
use App\Domain\Book\BookId;
use App\Domain\Book\BookLanguage;
use App\Domain\Book\BookRepository;
use App\Domain\Book\BookTitle;
use App\Domain\Book\BookUrl;
use PHPUnit\Framework\TestCase;


final class BookTest extends TestCase
{

    public function testSearchBookById():void
    {

        $mockRepo = new MockBookRepository();

        $service = new SearchBookById($mockRepo, '1');

        $book = $service->task();

        $this->assertInstanceOf(Book::class, $book);


    }


    public function testSearchBooksByTitle():void
    {

        $mockRepo = new MockBookRepository();

        $service = new SearchBooksByTitle($mockRepo, 'Titulo');

        $books = $service->task();

        $this->assertInstanceOf(Book::class, $books[0] );

    }

}


class MockBookRepository implements BookRepository
{

    public function getListByTitle(string $title): array
    {
        for($i=0; $i < 3; $i++){
            $out[] = $this->getBook();
        }
        return $out;
    }

    public function getById(string $id): ?Book
    {
        return  $this->getBook();
    }

    /**
     * @return Book
     */
    private function getBook(): Book
    {
        $book = new Book(
            new BookId(1),
            new BookTitle('Title'),
            new BookDescription('Description'),
            new BookUrl('http://www.google.es'),
            new BookAuthor('Author'),
            new BookLanguage('ES'));
        return $book;
    }
}




