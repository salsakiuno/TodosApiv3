<?php

namespace App\User\Infrastructure\ValueObjects;

use App\User\Domain\Exception\EmailValidationException;

class EmailValueObject
{
    private const EMAIL_LENGTH = 35;

    private function __construct(string $email)
    {
        $this->validate($email);
        $this->email = $email;
    }

    public static function validate($email): void
    {
        self::validateLength($email);
        self::validateEmailCharacters($email);
    }


    private static function validateLength($email): void
    {
        if(strlen($email) >= self::EMAIL_LENGTH) {
            throw new EmailValidationException();
        }
    }

    private static function validateEmailCharacters($email): void
    {
        if(!(filter_var($email, FILTER_VALIDATE_EMAIL))){
            throw new EmailValidationException();
        }
    }
}
