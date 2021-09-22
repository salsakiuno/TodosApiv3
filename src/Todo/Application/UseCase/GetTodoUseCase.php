<?php 

namespace App\Todo\Application\UseCase;

use App\Todo\Domain\Repository\TodoRepositoryInterface;
use App\Todo\Application\Response\GetTodosResponse;

class GetTodoUseCase
{
    public function __construct(TodoRepositoryInterface $todoRepositoryInterface)
    {
        $this->todoRepositoryInterface = $todoRepositoryInterface;
    }

    public function get(int $userId, int $todoId)
    {
        $todos =  $this->todoRepositoryInterface->findByIdAndUserId($userId, $todoId);
        return new GetTodosResponse($todos);
    }

}
