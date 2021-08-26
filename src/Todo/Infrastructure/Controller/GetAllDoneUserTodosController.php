<?php

namespace App\Todo\Infrastructure\Controller;

use App\Todo\Application\UseCase\GetAllDoneUserTodosUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetAllDoneUserTodosController
{
    private $getAllDoneUserTodosUseCase;

    public function __construct(
        GetAllDoneUserTodosUseCase $getAllDoneUserTodosUseCase
    )
    {
        $this->getAllDoneUserTodosUseCase = $getAllDoneUserTodosUseCase;
    }

    public function getAll(Int $id)
    {
        
        return new JsonResponse($this->getAllDoneUserTodosUseCase->getAll($id));
    }
}