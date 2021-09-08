<?php 

namespace App\User\Application\UseCase;

use App\User\Domain\Repository\UserRepositoryInterface;
use App\User\Domain\Entity\User;
use App\User\Application\Request\CreateUserRequest;
use App\User\Application\Response\CreateUserResponse;

class CreateUserUseCase
{
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
