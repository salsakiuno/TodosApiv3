<?php 

namespace App\Application\UseCase;

use App\Domain\Repository\UserRepositoryInterface;
use App\Application\Request\GetUserRequest;
use App\Application\Response\GetUserResponse;

class GetUserUseCase{
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function get(GetUserRequest $request)
    {
        $userInformation = $this->userRepositoryInterface->findById($request->getId());
         
        return new GetUserResponse($userInformation->id, $userInformation->user_name, $userInformation->email);
    }

    public function getAll()
    {
        $userInformation = $this->userRepositoryInterface->findAll();
         
        return $userInformation;
    }
}