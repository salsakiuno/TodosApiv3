<?php

namespace App\Application\Request;

class UserCreationRequest
{
    private $user_name;
    private $email;

    public function __construct(string $user_name, string $email){
        $this->user_name = $user_name;
        $this->email = $email; 
        
    }

    public function getUserName(){
        return $this->user_name;
    }
    public function getEmail(){
        return $this->email;
    }

}

