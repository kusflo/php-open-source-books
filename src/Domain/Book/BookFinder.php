<?php


namespace App\Domain\Book;


final class BookFinder
{
    private BookRepository $repo;

    /**
     * BookFinder constructor.
     * @param BookRepository $repo
     */
    public function __construct(BookRepository $repo)
    {
        $this->repo = $repo;
    }

    public function __invoke($id): Book
    {
        $book = $this->repo->getById($id);
        $this->checkBook($book, $id);
        return $book;
    }

    /**
     * @param Book|null $book
     * @param $id
     * @throws BookException
     */
    private function checkBook(?Book $book, $id): void
    {
        if (null === $book) {
            throw new BookException('Book with id ' . $id . ' not found');
        }
    }


}