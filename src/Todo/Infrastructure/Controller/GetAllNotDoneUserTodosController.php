<?php

namespace App\Todo\Infrastructure\Controller;

use App\Todo\Application\UseCase\GetAllNotDoneUserTodosUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetAllNotDoneUserTodosController
{
    private $getAllNotDoneUserTodosUseCase;

    public function __construct(
        GetAllNotDoneUserTodosUseCase $getAllNotDoneUserTodosUseCase
    )
    {
        $this->getAllNotDoneUserTodosUseCase = $getAllNotDoneUserTodosUseCase;
    }

    public function getAll(Int $id)
    {
        
        return new JsonResponse($this->getAllNotDoneUserTodosUseCase->getAll($id));
    }
}