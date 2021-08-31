<?php

namespace App\Application\Request;

class UpdateUserRequest
{
    private $user_name;
    private $email;
    private $id;

    public function __construct(int $id, string $user_name, string $email){
        $this->id = $id;
        $this->user_name = $user_name;
        $this->email = $email;
    }

    public function getUserName(){
        return $this->user_name;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getId(){
        return $this->id;
    }

}

