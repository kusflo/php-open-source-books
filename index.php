<?php


use App\Application\Search\Book\SearchBookById;
use App\Application\Search\Book\SearchBooksByTitle;
use App\Infrastructure\Book\BookRepoOpenLibra;


require __DIR__ . '/vendor/autoload.php';

try {

    $repo = new BookRepoOpenLibra();

    /**
     * Use Cases
     */

    /**
     * Get Books By Title
     */
    $books = (new SearchBooksByTitle($repo,'eloquent javascript'))->task();


    /**
     * Get Book By Id
     */
    $book = (new SearchBookById($repo, '13687'))->task();




} catch (Exception $e) {
    echo $e->getMessage();
}

function depureObject($obj) {
    var_dump($obj);
    die();

}





