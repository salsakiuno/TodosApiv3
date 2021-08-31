<?php

namespace App\Infrastructure\Controller;

use App\Application\UseCase\DeleteUserUseCase;
use App\Application\Request\DeleteUserRequest;
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