<?php


namespace App\Domain\Book;


interface BookRepository
{
    public function getListByTitle(string $title): array;

    public function getById(string $id): ?Book;



}