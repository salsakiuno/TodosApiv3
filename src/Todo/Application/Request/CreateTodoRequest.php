<?php

namespace App\Todo\Application\Request;

class CreateTodoRequest
{
    private string $title;
    private string $description;
    private int $userId;

    public function __construct(string $title, string $description, int $userId){
        $this->title = $title;
        $this->description = $description; 
        $this->userId = $userId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getUserId(): int
    {
        return $this->userId;
    }

}
