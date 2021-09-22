<?php 

namespace App\User\Application\UseCase;

use App\User\Domain\Repository\UserRepositoryInterface;
use App\User\Application\Response\GetUserResponse;

class GetUserUseCase{
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function get(Int $id)
    {
        $userInformation = $this->userRepositoryInterface->findById($id);
         
        return new GetUserResponse($userInformation->id, $userInformation->userName, $userInformation->email);
    }

    public function getAll()
    {
        $userInformation = $this->userRepositoryInterface->findAll();
         
        return $userInformation;
    }
}
