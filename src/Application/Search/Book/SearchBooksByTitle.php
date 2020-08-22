<?php


namespace App\Application\Search\Book;


use App\Domain\Book\BookRepository;

final class SearchBooksByTitle
{
    private BookRepository $repo;
    private string $title;

    public function __construct(BookRepository $repo, string $title)
    {
        $this->repo = $repo;
        $this->title = $title;

    }

    public function task(): array
    {

         return $this->repo->getListByTitle($this->title);
    }

}