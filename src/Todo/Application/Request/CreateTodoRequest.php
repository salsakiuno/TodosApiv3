<?php

namespace App\Todo\Application\Request;

class CreateTodoRequest
{
    private $title;
    private $description;
    private $userId;

    public function __construct(string $title, string $description, int $userId){
        $this->title = $title;
        $this->description = $description; 
        $this->userId = $userId;
    }

    public function getTitle(){
        return $this->title;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getUserId(){
        return $this->userId;
    }

}

