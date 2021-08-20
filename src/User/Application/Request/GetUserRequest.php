<?php

namespace App\User\Application\Request;

class GetUserRequest
{
    private $id;

    public function __construct(string $id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
}

