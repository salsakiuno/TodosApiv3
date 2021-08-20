<?php

namespace App\Application\Request;

class CreateUserRequest
{
    private $userName;
    private $email;

    public function __construct(string $userName, string $email){
        $this->userName = $userName;
        $this->email = $email; 
        
    }

    public function getUserName(){
        return $this->userName;
    }
    public function getEmail(){
        return $this->email;
    }

}

