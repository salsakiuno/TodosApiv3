<?php

namespace App\Infrastructure\Controller;

use App\Application\UseCase\GetUserUseCase;
use App\Application\Request\GetUserRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetUserController
{
    private $getUserInformationUseCase;

    public function __construct(GetUserUseCase $getUserUseCase)
    {
        $this->getUserUseCase = $getUserUseCase;
    }

    public function get(Int $id)
    {
        $getUserInformationRequest = new GetUserRequest($id);

        return new JsonResponse($this->getUserUseCase->get($getUserInformationRequest));
    }

}