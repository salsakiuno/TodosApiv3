<?php 

namespace App\Application\UseCase;

use App\Domain\Repository\UserRepositoryInterface;
use App\Domain\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;

class CreateUserUseCase{
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function create($request)
    {
        $body = $request -> getContent();
        $data = json_decode($body, true);
        $user = new User($data['user_name'], $data['email']);
        $this->userRepositoryInterface->save($user);
        return new JsonResponse('success: '.$data['user_name'].' '.$data['email']);
    }

}

