<?php

namespace App\User\Infrastructure\Controller;

use App\User\Application\UseCase\UpdateUserUseCase;
use App\User\Application\Request\UpdateUserRequest;
use App\User\Domain\Exception\EmailAlreadyExistException;
use App\User\Domain\Exception\EmailValidationException;
use App\User\Domain\Exception\UserAlreadyExistException;
use App\User\Domain\Exception\UserNameValidationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserController
{
    private $updateUserUseCase;

    public function __construct(UpdateUserUseCase $updateUserUseCase)
    {
        $this->updateUserUseCase = $updateUserUseCase;
    }

    public function update(Int $id, Request $request)
    {
        try {
            $updateUserRequest = new UpdateUserRequest(
                $id, 
                $request->get('userName'),
                $request->get('email')
            );
    
            return new JsonResponse($this->updateUserUseCase->update($updateUserRequest));
        } catch (EmailAlreadyExistException $emailAlreadyExist) {
            return new JsonResponse(
                $emailAlreadyExist->getErrors(),
                Response::HTTP_BAD_REQUEST
            );
        } catch(EmailValidationException $validationException) { 
            return new JsonResponse(
                $validationException->getErrors(),
                Response::HTTP_BAD_REQUEST
            );
        } catch(UserNameValidationException $validationException) { 
            return new JsonResponse(
                $validationException->getErrors(),
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}
