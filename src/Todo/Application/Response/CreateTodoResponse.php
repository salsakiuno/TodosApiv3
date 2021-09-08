<?php

namespace App\Todo\Application\Response;

class CreateTodoResponse implements \JsonSerializable
{
    private $todoId;

    public function __construct(int $todoId)
    {
        $this->todoId = $todoId;
    }

    public function getTodoId(): int
    {
        return $this->todoId;
    }

    public function jsonSerialize(): array
    {
        return [
            'message' => 'Todo created correctly',
            'id' => $this->getTodoId()
        ];
    }
}
