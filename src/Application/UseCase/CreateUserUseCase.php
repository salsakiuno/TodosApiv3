<?php 

namespace App\Application\UseCase;

use App\Domain\Repository\UserRepositoryInterface;
use App\Domain\Entity\User;
use App\Application\Request\CreateUserRequest;
use App\Application\Response\CreateUserResponse;

class CreateUserUseCase{
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function create(CreateUserRequest $request)
    {
        $user = new User(
            $request->getUserName(),
            $request->getEmail()
        );

        $this->userRepositoryInterface->save($user);
        $userId = $this->userRepositoryInterface->findByEmail($request->getEmail());
        
        return new CreateUserResponse($userId->id, $request->getUserName());
    }

}

