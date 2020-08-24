<?php


namespace App\Domain\Book;


use App\Domain\Shared\ValueObject\StringValueObject;
use http\Exception\InvalidArgumentException;

final class BookUrl extends StringValueObject
{
    public function __construct(string $value)
    {
        $this->guardValidUrl($value);

        parent::__construct($value);
    }

    private function guardValidUrl($url)
    {
        if(null === filter_var($url, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException(sprintf('The url <%s> is not well formatted', $url));
        }
    }


}