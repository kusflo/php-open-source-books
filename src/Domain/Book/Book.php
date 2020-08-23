<?php


namespace App\Domain\Book;


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
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->author = $author;
        $this->language = $language;
    }

    public function renameTitle(string $newName)
    {
        $this->title = $newName;
    }


}