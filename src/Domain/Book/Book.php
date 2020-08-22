<?php


namespace App\Domain\Book;


use Exception;

final class Book
{
    private string $id;
    private string $title;
    private string $description;
    private string $url;
    private string $author;
    private string $language;
        /**
     * Book constructor.
     * @param string $id
     * @param string $title
     * @param string $description
     * @param string $url
     * @param string $author
     * @param string $language
     */
    public function __construct(string $id, string $title, string $description,
                                string $url, string $author, string $language)
    {
        $this->checkBook($id);
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->author = $author;
        $this->language = $language;
    }

    private function checkBook(string $id)
    {
        if(!is_numeric($id)){
            new Exception("Can't make a correct book");
        }

    }


}