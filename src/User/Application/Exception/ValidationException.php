<?php

namespace App\User\Application\Exception;

class ValidationException extends \DomainException
{
    protected $message = 'INVALID_DATA';
    protected $code = 400;

    private $errors;

    public function __construct(array $errors)
    {
        parent::__construct();
        $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return ['errors' => $this->errors];
    }

}
