<?php
namespace App\Infrastructure\Controller;

use App\Application\UseCase\CreateUserUseCase;
use App\Application\Request\UserCreationRequest;
use App\Application\UseCase\GetUserInformationUseCase;
use App\Application\Request\GetUserInformationRequest;
use App\Application\UseCase\UpdateUserUseCase;
use App\Application\Request\UpdateUserRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController
{
    private $createUserUseCase;
    private $getUserInformationUseCase;
    private $updateUserUseCase;

    public function __construct(
    CreateUserUseCase $createUserUseCase,
    GetUserInformationUseCase $getUserInformationUseCase,
    UpdateUserUseCase $updateUserUseCase 
    )
    {
        $this->createUserUseCase = $createUserUseCase;
        $this->getUserInformationUseCase = $getUserInformationUseCase;
        $this->updateUserUseCase = $updateUserUseCase;
    }

    public function create(Request $request)
    {
        $userCreationRequest = new UserCreationRequest(
            $request->get('user_name'), 
            $request->get('email')
        );

        return new JsonResponse($this->createUserUseCase->create($userCreationRequest));
    }

    public function get(Int $id)
    {
        $getUserInformationRequest = new GetUserInformationRequest($id);

        return new JsonResponse($this->getUserInformationUseCase->get($getUserInformationRequest));
    }

    public function update(Int $id, Request $request)
    {
        $updateUserRequest = new UpdateUserRequest(
            $id, 
            $request->get('user_name'),
            $request->get('email')
        );

        return new JsonResponse($this->updateUserUseCase->update($updateUserRequest));
    }
}