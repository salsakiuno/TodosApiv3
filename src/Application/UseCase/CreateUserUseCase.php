<?php 

namespace App\Application\UseCase;

use App\Domain\Repository\UserRepositoryInterface;
use App\Domain\Entity\User;
use App\Application\Request\UserCreationRequest;
use App\Application\Response\UserCreationResponse;

class CreateUserUseCase{
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function create(UserCreationRequest $request)
    {
        $user = new User(
            $request->getUserName(),
            $request->getEmail()
        );

        $this->userRepositoryInterface->save($user);
        $userId = $this->userRepositoryInterface->findByEmail($request->getEmail());
        
        return new UserCreationResponse($userId->id, $request->getUserName());
    }

}

