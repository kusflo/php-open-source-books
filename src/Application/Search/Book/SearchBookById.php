<?php


namespace App\Application\Search\Book;


use App\Domain\Book\Book;
use App\Domain\Book\BookFinder;
use App\Domain\Book\BookRepository;

final class SearchBookById
{

    private BookRepository $repo;
    private string $id;

    /**
     * SearchBookById constructor.
     * @param BookRepository $repo
     * @param string $id
     */
    public function __construct(BookRepository $repo, string $id)
    {
        $this->repo = $repo;
        $this->id = $id;
    }

    public function task(): ?Book
    {
        return (new BookFinder($this->repo))->__invoke($this->id);
    }


}