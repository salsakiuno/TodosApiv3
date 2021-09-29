<?php 

namespace App\User\Application\UseCase;

use App\User\Domain\Repository\UserRepositoryInterface;
use App\User\Domain\Entity\User;
use App\User\Application\Request\CreateUserRequest;
use App\User\Application\Response\CreateUserResponse;
use App\User\Domain\Exception\EmailAlreadyExistException;
use App\User\Domain\Service\EmailValidation;
use App\User\Domain\Service\UserNameValidation;
use App\User\Infrastructure\ValueObjects\EmailValueObject;


class CreateUserUseCase
{    
    public function __construct(
        UserRepositoryInterface $userRepositoryInterface,
        UserNameValidation $userNameValidation
        )
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
        $this->userNameValidation = $userNameValidation;
    }

    public function create(CreateUserRequest $request)
    {
        $userSearchByEmail = $this->userRepositoryInterface->findByEmail($request->getEmail());

        if($userSearchByEmail instanceof User) {
            throw new EmailAlreadyExistException();
        }
        EmailValueObject::validate($request->getEmail());
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
