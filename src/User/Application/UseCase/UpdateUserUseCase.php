<?php 

namespace App\User\Application\UseCase;

use App\User\Domain\Repository\UserRepositoryInterface;
use App\User\Application\Request\UpdateUserRequest;
use App\User\Application\Response\UpdateUserResponse;
use App\User\Domain\Entity\User;
use App\User\Domain\Exception\EmailAlreadyExistException;
use App\User\Domain\Service\UserNameValidation;
use App\User\Infrastructure\ValueObjects\EmailValueObject;

class UpdateUserUseCase{

    public function __construct(
        UserRepositoryInterface $userRepositoryInterface,
        UserNameValidation $userNameValidation
        )
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
        $this->userNameValidation = $userNameValidation;
    }

    public function update(UpdateUserRequest $request)
    {
        
        $userSearchByEmail = $this->userRepositoryInterface->findByEmail($request->getEmail());

        if($userSearchByEmail instanceof User) {
           throw new EmailAlreadyExistException();
        }

        EmailValueObject::validate($request->getEmail());
        $this->userNameValidation->validate($request->getUserName());
        $user = $this->userRepositoryInterface->findById($request->getId());

        $user -> setUserName($request->getUserName())
              -> setEmail($request->getEmail());

        $this->userRepositoryInterface->save($user);
        
        $userUpdated = $this->userRepositoryInterface->findById($request->getId());
        return new UpdateUserResponse(
            $userUpdated->id,
            $userUpdated->userName,
            $userUpdated->email);
    }
}
