<?php


namespace App\Domain\Book;


final class Book
{
    private BookId $id;
    private BookTitle $title;
    private BookDescription $description;
    private BookUrl $url;
    private BookAuthor $author;
    private BookLanguage $language;

    /**
     * Book constructor.
     * @param BookId $id
     * @param BookTitle $title
     * @param BookDescription $description
     * @param BookUrl $url
     * @param BookAuthor $author
     * @param BookLanguage $language
     */
    public function __construct(BookId $id, BookTitle $title, BookDescription $description,
                                BookUrl $url, BookAuthor $author, BookLanguage $language)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->author = $author;
        $this->language = $language;
    }

    public static function create(BookId $id, BookTitle $title, BookDescription $description,
                                  BookUrl $url, BookAuthor $author, BookLanguage $language): Book
    {
        $book = new self($id, $title, $description, $url, $author, $language);
        return $book;
    }

    public function updateTitle(BookTitle $title)
    {
        $this->title = $title;
    }


}