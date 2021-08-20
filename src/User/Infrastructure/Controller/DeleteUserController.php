<?php

namespace App\User\Infrastructure\Controller;

use App\User\Application\UseCase\DeleteUserUseCase;
use App\User\Application\Request\DeleteUserRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class DeleteUserController
{
    private $deleteUserUseCase;

    public function __construct(DeleteUserUseCase $deleteUserUseCase)
    {
        $this->deleteUserUseCase = $deleteUserUseCase;
    }

    public function delete (Int $id)
    {
        $userId = new DeleteUserRequest($id);

        return new JsonResponse($this->deleteUserUseCase->delete($userId));

    }
}