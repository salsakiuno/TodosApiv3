<?php 

namespace App\User\Application\UseCase;

use App\User\Domain\Repository\UserRepositoryInterface;
use App\User\Application\Request\DeleteUserRequest;
use App\User\Application\Response\DeleteUserResponse;

class DeleteUserUseCase{
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function delete(DeleteUserRequest $request)
    {

        $user = $this->userRepositoryInterface->findById($request->getId());
        $this->userRepositoryInterface->delete($user);
        
        return new DeleteUserResponse($user->user_name, $user->email);
    }
}

