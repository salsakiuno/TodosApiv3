<?php

namespace App\User\Infrastructure\Controller;

use App\User\Application\UseCase\UpdateUserUseCase;
use App\User\Application\Request\UpdateUserRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UpdateUserController
{
    private $updateUserUseCase;

    public function __construct(UpdateUserUseCase $updateUserUseCase)
    {
        $this->updateUserUseCase = $updateUserUseCase;
    }

    public function update(Int $id, Request $request)
    {
        $updateUserRequest = new UpdateUserRequest(
            $id, 
            $request->get('userName'),
            $request->get('email')
        );

        return new JsonResponse($this->updateUserUseCase->update($updateUserRequest));
    }


}