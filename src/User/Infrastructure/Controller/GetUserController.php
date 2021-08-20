<?php

namespace App\User\Infrastructure\Controller;

use App\User\Application\UseCase\GetUserUseCase;
use App\User\Application\Request\GetUserRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetUserController
{
    private $getUserUseCase;

    public function __construct(GetUserUseCase $getUserUseCase)
    {
        $this->getUserUseCase = $getUserUseCase;
    }

    public function get(Int $id)
    {
        $getUserRequest = new GetUserRequest($id);

        return new JsonResponse($this->getUserUseCase->get($getUserRequest));
    }

    public function getAll()
    {
        return new JsonResponse($this->getUserUseCase->getAll());
    }
    
}