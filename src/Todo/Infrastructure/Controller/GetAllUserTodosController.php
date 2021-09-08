<?php

namespace App\Todo\Infrastructure\Controller;

use App\Todo\Application\UseCase\GetAllUserTodosUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetAllUserTodosController
{
    private $getAllTodosUseCase;

    public function __construct(
        GetAllUserTodosUseCase $getAllTodosUseCase
    )
    {
        $this->getAllTodosUseCase = $getAllTodosUseCase;
    }

    public function getAll(Int $id)
    {
        
        return new JsonResponse($this->getAllTodosUseCase->getAll($id));
    }
}
