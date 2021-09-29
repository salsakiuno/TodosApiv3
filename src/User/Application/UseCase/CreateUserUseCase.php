<?php 

namespace App\User\Application\UseCase;

use App\User\Domain\Repository\UserRepositoryInterface;
use App\User\Domain\Entity\User;
use App\User\Application\Request\CreateUserRequest;
use App\User\Application\Response\CreateUserResponse;
use App\User\Domain\Exception\EmailValidationException;
use App\User\Domain\Exception\UserNameValidationException;
use App\User\Domain\Service\EmailValidation;
use App\User\Domain\Service\UserNameValidation;


class CreateUserUseCase
{    
    public function __construct(
        UserRepositoryInterface $userRepositoryInterface, 
        EmailValidation $emailValidation,
        UserNameValidation $userNameValidation
        )
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
        $this->emailValidation = $emailValidation;
        $this->userNameValidation = $userNameValidation;
    }

    public function create(CreateUserRequest $request)
    {
            $this->emailValidation->validate($request->getEmail());
            $this->userNameValidation->validate($request->getUserName());
            $user = new User(
                $request->getUserName(),
                $request->getEmail()
            );
    
            $this->userRepositoryInterface->save($user);
            $userId = $this->userRepositoryInterface->findByEmail($request->getEmail());
            $return = new CreateUserResponse($userId->id, $request->getUserName());

            return $return;
    }
}
