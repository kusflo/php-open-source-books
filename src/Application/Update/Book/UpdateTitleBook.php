<?php


namespace App\Application\Update\Book;


use App\Domain\Book\Book;
use App\Domain\Book\BookFinder;
use App\Domain\Book\BookId;
use App\Domain\Book\BookRepository;
use App\Domain\Book\BookTitle;

class UpdateTitleBook
{

    private BookRepository $repo;
    private BookId $idBook;
    private BookTitle $title;

    /**
     * RenameBook constructor.
     * @param BookRepository $repo
     * @param int $idBook
     * @param string $title
     */
    public function __construct(BookRepository $repo, int $idBook, string $title)
    {
        $this->repo = $repo;
        $this->idBook = new BookId($idBook);
        $this->title = new BookTitle($title);
    }

    public function task (): Book
    {
        $book = (new BookFinder($this->repo))->__invoke($this->idBook);
        $book->updateTitle($this->title);
        return $book;
    }

}