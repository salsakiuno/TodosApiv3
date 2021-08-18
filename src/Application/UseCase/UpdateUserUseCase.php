<?php 

namespace App\Application\UseCase;

use App\Domain\Repository\UserRepositoryInterface;
use App\Domain\Entity\User;
use App\Application\Request\UpdateUserRequest;
use App\Application\Response\UpdateUserResponse;

class UpdateUserUseCase{

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function update(UpdateUserRequest $request)
    {
        $user = $this->userRepositoryInterface->findById($request->getId());

        $user -> setUserName($request->getUserName())
              -> setEmail($request->getEmail());

        $this->userRepositoryInterface->save($user);
        
        $userUpdated = $this->userRepositoryInterface->findById($request->getId());
        return new UpdateUserResponse(
            $userUpdated->id,
            $userUpdated->user_name,
            $userUpdated->email);
    }

}

