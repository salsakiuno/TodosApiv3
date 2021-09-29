<?php

namespace App\User\Domain\Service;

use App\User\Domain\Exception\UserNameValidationException;

class UserNameValidation
{
    private const USERNAME_LENGTH = 20;

    function validate($userName): void
    {
        $this->validateLength($userName);
    }

    function validateLength($userName): void
    {
        if(strlen($userName) >= self::USERNAME_LENGTH || empty($userName)){
            throw new UserNameValidationException();
        }
    }
}
