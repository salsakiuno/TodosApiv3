<?php

namespace App\User\Domain\Service;

use App\User\Domain\Exception\EmailValidationException;

class EmailValidation
{
    private const EMAIL_LENGTH = 35;

    function validate($email): void
    {
        $this->validateLength($email);
        $this->validateEmailCharacters($email);
    }

    function validateLength($email): void
    {
        if(strlen($email) >= self::EMAIL_LENGTH){
            throw new EmailValidationException();
        }
    }

    function validateEmailCharacters($email): void
    {
        if(!(filter_var($email, FILTER_VALIDATE_EMAIL))){
            throw new EmailValidationException();
        }
    }
}
