<?php


namespace App\Domain\Shared\Exception;


use Exception;

class MyException extends Exception
{

    public function getInfoError()
    {
        return  ' Exception: ' . get_class($this) . PHP_EOL
                . ' File: ' . $this->file . PHP_EOL
                . ' Line:' . $this->line . PHP_EOL
                . ' Message: ' . $this->message . PHP_EOL;
    }
}