<?php

namespace App\User\Domain\Service;

use App\User\Domain\Exception\ValidationException;

class EmailValidation
{
    private const EMAIL_LENGTH = 35;
    private const EMAIL_CHARACTER = "/[@]/";


    function validate($email): void
    {
        $this->validateLength($email);
        $this->validateEmailCharacters($email);
    }

    function validateLength($email): void
    {
        if(strlen($email) >= self::EMAIL_LENGTH){
            throw new ValidationException();
        }
    }

    function validateEmailCharacters($email): void
    {
        if(!(preg_match(self::EMAIL_CHARACTER, $email))){
            throw new ValidationException();
        }
    }
}
