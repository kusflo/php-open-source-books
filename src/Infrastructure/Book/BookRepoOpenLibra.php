<?php

namespace App\Infrastructure\Book;

use App\Domain\Book\Book;
use App\Domain\Book\BookAuthor;
use App\Domain\Book\BookDescription;
use App\Domain\Book\BookId;
use App\Domain\Book\BookLanguage;
use App\Domain\Book\BookRepository;
use App\Domain\Book\BookTitle;
use App\Domain\Book\BookUrl;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class BookRepoOpenLibra
 * @package App\Infrastructure\Book
 *
 * url: https://openlibra.com/es/page/public-api
 */
final class BookRepoOpenLibra implements BookRepository
{
    const __URL_GET = 'https://www.etnassoft.com/api/v1/get/';

    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getById(string $id): ?Book
    {
        $response = $this->client->get(self::__URL_GET . '?id=' . $id);
        $array = $this->jsonToArrayObjects($response);
        $book = $this->generatetBook($array[0]);
        return $book;
    }


    public function getListByTitle(string $title): array
    {
        $out = array();
        $response = $this->client->get(self::__URL_GET . '?book_title="' . $title .'"');
        $array = $this->jsonToArrayObjects($response);
        foreach($array as $l) {
            $out[] = $this->generatetBook($l);
        }
        return $out;
    }

    private function jsonToArrayObjects(ResponseInterface $response)
    {
        return json_decode($response->getBody());
    }

    /**
     * @param $l
     * @return Book
     */
    private function generatetBook($obj): Book
    {

        return new Book(
            new BookID($obj->ID),
            new BookTitle($obj->title),
            new BookDescription($obj->content_short),
            new BookUrl($obj->url_download),
            new BookAuthor($obj->author),
            new BookLanguage($obj->language)
        );
    }
}