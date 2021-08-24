<?php

namespace App\Todo\Infrastructure\Controller;

use App\Todo\Application\UseCase\CreateTodoUseCase;
use App\Todo\Application\Request\CreateTodoRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CreateTodoController
{
    private $createTodoUseCase;

    public function __construct(
        CreateTodoUseCase $createTodoUseCase
    )
    {
        $this->createTodoUseCase = $createTodoUseCase;
    }

    public function create(Request $request)
    {
        $createTodoRequest = new CreateTodoRequest(
            $request->get('title'), 
            $request->get('description'),
            $request->get('userId')
        );
        
        return new JsonResponse($this->createTodoUseCase->create($createTodoRequest));
    }
}