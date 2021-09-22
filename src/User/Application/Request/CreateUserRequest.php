<?php

namespace App\User\Application\Request;

class CreateUserRequest
{
    private string $userName;
    private string $email;

    public function __construct(string $userName, string $email){
        $this->userName = $userName;
        $this->email = $email; 
        
    }

    public function getUserName(): string
    {
        return $this->userName;
    }
    public function getEmail(): string
    {
        return $this->email;
    }

}
