<?php

namespace App\Application\Request;

class GetUserInformationRequest
{
    private $id;

    public function __construct(string $id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
}

