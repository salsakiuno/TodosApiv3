<?php 

namespace App\Application\UseCase;

use App\Domain\Repository\UserRepositoryInterface;
use App\Application\Request\DeleteUserRequest;
use App\Application\Response\DeleteUserResponse;

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
