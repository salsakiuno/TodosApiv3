<?php

namespace App\Todo\Application\Request;

class DeleteTodoRequest
{
    private $userId;
    private $id;

    public function __construct(int $id, int $userId){
        $this->id = $id;
        $this->userId = $userId;
    }
    
    public function getId(){
        return $this->id;
    }
    public function getUserId(){
        return $this->userId;
    }

}

