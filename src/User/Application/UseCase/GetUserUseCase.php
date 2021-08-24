<?php 

namespace App\User\Application\UseCase;

use App\User\Domain\Repository\UserRepositoryInterface;
use App\User\Application\Request\GetUserRequest;
use App\User\Application\Response\GetUserResponse;

class GetUserUseCase{
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function get(GetUserRequest $request)
    {
        $userInformation = $this->userRepositoryInterface->findById($request->getId());
         
        return new GetUserResponse($userInformation->id, $userInformation->userName, $userInformation->email);
    }

    public function getAll()
    {
        $userInformation = $this->userRepositoryInterface->findAll();
         
        return $userInformation;
    }
}