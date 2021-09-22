<?php

namespace App\Todo\Infrastructure\Controller;

use App\Todo\Application\UseCase\UpdateTodoUseCase;
use App\Todo\Application\Request\UpdateTodoRequest;
use App\Todo\Application\Request\UpdateDoneRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UpdateTodoController
{
    private $updateTodoUseCase;

    public function __construct(UpdateTodoUseCase $updateTodoUseCase)
    {
        $this->updateTodoUseCase = $updateTodoUseCase;
    }

    public function update(Int $userId, Int $todoId, Request $request)
    {
        $updateTodoRequest = new UpdateTodoRequest(
            $userId,
            $todoId, 
            $request->get('title'),
            $request->get('description')
        );

        return new JsonResponse($this->updateTodoUseCase->update($updateTodoRequest));
    }
}
