<?php
namespace App\Infrastructure\Controller;

use App\Application\UseCase\CreateUserUseCase;
use App\Application\Request\UserCreationRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserCreationController
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
        $userCreationRequest = new UserCreationRequest(
            $request->get('user_name'), 
            $request->get('email')
        );

        return new JsonResponse($this->createUserUseCase->create($userCreationRequest));
    }
}