<?php

namespace App\Todo\Infrastructure\Controller;

use App\Todo\Application\UseCase\GetTodoUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetTodoCrontroller
{
    private $getTodoUseCase;

    public function __construct(
        GetTodoUseCase $getTodoUseCase
        )
    {
        $this->getTodoUseCase = $getTodoUseCase;
    }

    public function get(int $userId, int $todoId)
    {
        return new JsonResponse($this->getTodoUseCase->get($userId, $todoId));
    }
}
