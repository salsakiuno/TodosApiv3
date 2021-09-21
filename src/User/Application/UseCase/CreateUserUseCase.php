<?php 

namespace App\User\Application\UseCase;

use App\User\Domain\Repository\UserRepositoryInterface;
use App\User\Domain\Entity\User;
use App\User\Application\Request\CreateUserRequest;
use App\User\Application\Response\CreateUserResponse;
use App\User\Domain\Exception\ValidationException;
use App\User\Domain\Service\EmailValidation;


class CreateUserUseCase
{    
    public function __construct(UserRepositoryInterface $userRepositoryInterface, EmailValidation $emailValidation)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
        $this->emailValidation = $emailValidation;
    }

    public function create(CreateUserRequest $request)
    {
         try {
            $this->emailValidation->validate($request->getEmail());
            //$emailValidation->validate($request);
            $user = new User(
                $request->getUserName(),
                $request->getEmail()
            );
    
            $this->userRepositoryInterface->save($user);
            $userId = $this->userRepositoryInterface->findByEmail($request->getEmail());
            $return = new CreateUserResponse($userId->id, $request->getUserName());

            return $return;
        } catch(ValidationException $error) {
            throw $error;
         }
    }
}
