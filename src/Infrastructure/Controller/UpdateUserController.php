<?php

namespace App\Infrastructure\Controller;

use App\Application\UseCase\UpdateUserUseCase;
use App\Application\Request\UpdateUserRequest;
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
            $request->get('user_name'),
            $request->get('email')
        );

        return new JsonResponse($this->updateUserUseCase->update($updateUserRequest));
    }


}