<?php

namespace App\User\Domain\Exception;

class EmailAlreadyExistException extends \Exception 
{
    protected const MESSAGE = 'EMAIL ALREADY IN USE';
    
    public function getErrors()
    {
        return [self::MESSAGE];
    }
}
