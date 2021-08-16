<?php
namespace App\Infrastructure\Controller;

use App\Application\UseCase\CreateUserUseCase;
use Symfony\Component\HttpFoundation\Request;

class UserController
{
    private $createUserUseCase;

    public function __construct(CreateUserUseCase $createUserUseCase)
    {
        $this->createUserUseCase = $createUserUseCase;
    }

    public function create(Request $request)
    {
        return $this->createUserUseCase->create($request);
    }
}