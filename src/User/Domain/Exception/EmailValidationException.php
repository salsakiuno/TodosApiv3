<?php

namespace App\User\Domain\Exception;

class EmailValidationException extends \Exception 
{
    protected const MESSAGE = 'INVALID_EMAIL';
    
    public function getErrors()
    {
        return [self::MESSAGE];
    }
}
