<?php

namespace App\Todo\Application\Response;

class DeleteTodoResponse implements \JsonSerializable
{
    private $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function jsonSerialize(): array
    {
        return [
            'message' => 'Todo deleted correctly',
            'todo title' => $this->getTitle()
        ];
    }
}
