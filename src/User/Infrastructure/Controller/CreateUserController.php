<?php
namespace App\User\Infrastructure\Controller;

use App\User\Application\UseCase\CreateUserUseCase;
use App\User\Application\Request\CreateUserRequest;
use App\User\Domain\Exception\ValidationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateUserController
{
    private $createUserUseCase;

    public function __construct(
    CreateUserUseCase $createUserUseCase
    )
    {
        $this->createUserUseCase = $createUserUseCase;
    }

    public function create(Request $request)
    {
         try {
            $createUserRequest = new CreateUserRequest(
                $request->get('userName'), 
                $request->get('email')
            );
            return new JsonResponse($this->createUserUseCase->create($createUserRequest));
         } catch(ValidationException $validationException) {
             return new JsonResponse($validationException->getErrors(), Response::HTTP_BAD_REQUEST);
        }

    }
}
