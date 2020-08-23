<?php


namespace App\Application\Update\Book;


use App\Domain\Book\Book;
use App\Domain\Book\BookFinder;
use App\Domain\Book\BookRepository;

class RenameBook
{

    private BookRepository $repo;
    private string $idBook;
    private string $newName;

    /**
     * RenameBook constructor.
     * @param BookRepository $repo
     * @param string $idBook
     * @param string $newName
     */
    public function __construct(BookRepository $repo, string $idBook, string $newName)
    {
        $this->repo = $repo;
        $this->idBook = $idBook;
        $this->newName = $newName;
    }

    public function task (): Book
    {
        $book = (new BookFinder($this->repo))->__invoke($this->idBook);
        $book->renameTitle($this->newName);
        return $book;
    }

}