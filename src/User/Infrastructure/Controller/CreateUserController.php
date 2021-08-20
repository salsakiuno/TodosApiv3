<?php
namespace App\User\Infrastructure\Controller;

use App\User\Application\UseCase\CreateUserUseCase;
use App\User\Application\Request\CreateUserRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

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
        $createUserRequest = new CreateUserRequest(
            $request->get('userName'), 
            $request->get('email')
        );
        
        return new JsonResponse($this->createUserUseCase->create($createUserRequest));
    }
}