<?php

namespace App\Todo\Application\Response;

class GetAllUserTodosResponse implements \JsonSerializable
{
    private $todos;

    public function __construct(array $todos)
    {
        $this->todos = $todos;
    }

    public function getTodos()
    {
        return $this->todos;
    }

    public function jsonSerialize(): array
    {
        return [
            'todos' => $this->getTodos()
        ];
    }
}