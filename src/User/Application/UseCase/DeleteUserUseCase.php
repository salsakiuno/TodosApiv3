<?php 

namespace App\User\Application\UseCase;

use App\User\Domain\Repository\UserRepositoryInterface;
use App\Todo\Domain\Repository\TodoRepositoryInterface;
use App\User\Application\Request\DeleteUserRequest;
use App\User\Application\Response\DeleteUserResponse;

class DeleteUserUseCase
{
    public function __construct(
        UserRepositoryInterface $userRepositoryInterface,
        TodoRepositoryInterface $todoRepositoryInterface
        )
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
        $this->todoRepositoryInterface = $todoRepositoryInterface;
    }

    public function delete(DeleteUserRequest $request)
    {

        $user = $this->userRepositoryInterface->findById($request->getId());
        $this->userRepositoryInterface->delete($user);
        $this->todoRepositoryInterface->deleteAllByUserId($request->getId());
        
        return new DeleteUserResponse($user->userName, $user->email);
    }
}
