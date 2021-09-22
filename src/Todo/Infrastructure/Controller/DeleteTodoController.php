<?php

namespace App\Todo\Infrastructure\Controller;

use App\Todo\Application\UseCase\DeleteTodoUseCase;
use App\Todo\Application\Request\DeleteTodoRequest;

use Symfony\Component\HttpFoundation\JsonResponse;

class DeleteTodoController
{
    private $deleteTodoUseCase;

    public function __construct(DeleteTodoUseCase $deleteTodoUseCase)
    {
        $this->deleteTodoUseCase = $deleteTodoUseCase;
    }

    public function delete(Int $userId, Int $todoId)
    {
        $deleteTodoRequest = new DeleteTodoRequest(
            $userId,
            $todoId
        );

        return new JsonResponse($this->deleteTodoUseCase->delete($deleteTodoRequest));
    }
}
