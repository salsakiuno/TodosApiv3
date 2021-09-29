<?php

namespace App\User\Domain\Exception;

class UserNameValidationException extends \Exception 
{
    protected const MESSAGE = 'INVALID_USER_NAME';
    
    public function getErrors()
    {
        return [self::MESSAGE];
    }
}
