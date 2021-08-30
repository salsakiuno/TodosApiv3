<?php

namespace App\Todo\Application\Response;

class UpdateTodoResponse implements \JsonSerializable
{
    private $id;
    private $title;
    private $description;

    public function __construct(int $id, string $title, string $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function jsonSerialize(): array
    {
        return [
            'message' => 'Todo updated correctly',
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'description' => $this->getDescription()
        ];
    }
}