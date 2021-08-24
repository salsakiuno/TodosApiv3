<?php

namespace App\User\Application\Request;

class UpdateUserRequest
{
    private $userName;
    private $email;
    private $id;

    public function __construct(int $id, string $userName, string $email){
        $this->id = $id;
        $this->userName = $userName;
        $this->email = $email;
    }

    public function getUserName(){
        return $this->userName;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getId(){
        return $this->id;
    }

}

