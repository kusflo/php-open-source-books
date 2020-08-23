<?php


use App\Application\Search\Book\SearchBookById;
use App\Application\Search\Book\SearchBooksByTitle;
use App\Application\Update\Book\RenameBook;
use App\Domain\Exception\MyException;
use App\Infrastructure\Book\BookRepoOpenLibra;


require __DIR__ . '/vendor/autoload.php';

try {

    $repo = new BookRepoOpenLibra();
    $idBook = '13687';

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
    $book = (new SearchBookById($repo, $idBook))->task();

    /**
     * Rename Book
     */
    $newName = 'Php Book';
    $book = (new RenameBook($repo, $idBook, $newName))->task();
    depureObject($book);

} catch (MyException $e) {
    echo $e->getInfoError();
}

function depureObject($obj) {
    var_dump($obj);
    die();

}





