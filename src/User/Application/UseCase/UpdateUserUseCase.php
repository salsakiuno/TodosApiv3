<?php 

namespace App\User\Application\UseCase;

use App\User\Domain\Repository\UserRepositoryInterface;
use App\User\Application\Request\UpdateUserRequest;
use App\User\Application\Response\UpdateUserResponse;

class UpdateUserUseCase{

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function update(UpdateUserRequest $request)
    {
        $user = $this->userRepositoryInterface->findById($request->getId());
        var_dump($user);

        $user -> setUserName($request->getUserName())
              -> setEmail($request->getEmail());

        $this->userRepositoryInterface->save($user);
        
        $userUpdated = $this->userRepositoryInterface->findById($request->getId());
        return new UpdateUserResponse(
            $userUpdated->id,
            $userUpdated->userName,
            $userUpdated->email);
    }

}

