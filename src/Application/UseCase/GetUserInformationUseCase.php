<?php 

namespace App\Application\UseCase;

use App\Domain\Repository\UserRepositoryInterface;
use App\Application\Request\GetUserInformationRequest;
use App\Application\Response\GetUserInformationResponse;

class GetUserInformationUseCase{
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function get(GetUserInformationRequest $request)
    {
        $userInformation = $this->userRepositoryInterface->findById($request->getId());
         
        return new GetUserInformationResponse($userInformation->id, $userInformation->user_name, $userInformation->email);
    }

}