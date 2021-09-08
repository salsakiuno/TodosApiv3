<?php

namespace App\User\Infrastructure\Controller;

use App\User\Application\UseCase\GetUserUseCase;
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

        return new JsonResponse($this->getUserUseCase->get($id));
    }

    public function getAll()
    {
        return new JsonResponse($this->getUserUseCase->getAll());
    }
}
