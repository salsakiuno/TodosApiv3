<?php

namespace App\Todo\Application\Request;

class UpdateTodoRequest
{
    private int $userId;
    private int $id;
    private string $title;
    private string $description;

    public function __construct(int $id, int $userId, string $title, string $description){
        $this->id = $id;
        $this->userId = $userId;
        $this->title = $title;
        $this->description = $description;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getUserId(): int
    {
        return $this->userId;
    }

}
