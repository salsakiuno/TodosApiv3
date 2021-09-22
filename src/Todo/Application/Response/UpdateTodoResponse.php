<?php

namespace App\Todo\Application\Response;

class UpdateTodoResponse implements \JsonSerializable
{
    private int $id;
    private string $title;
    private string $description;

    public function __construct(int $id, string $title, string $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
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
