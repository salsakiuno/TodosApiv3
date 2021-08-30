<?php

namespace App\Todo\Application\Request;

class UpdateTodoRequest
{
    private $userId;
    private $id;
    private $title;
    private $description;

    public function __construct(int $id, int $userId, string $title, string $description){
        $this->id = $id;
        $this->userId = $userId;
        $this->title = $title;
        $this->description = $description;
    }

    public function getTitle(){
        return $this->title;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getId(){
        return $this->id;
    }
    public function getUserId(){
        return $this->userId;
    }

}

