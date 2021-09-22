<?php 

namespace App\Todo\Application\UseCase;

use App\Todo\Domain\Repository\TodoRepositoryInterface;
use App\Todo\Application\Response\GetTodosResponse;

class GetAllDoneUserTodosUseCase
{
    public function __construct(TodoRepositoryInterface $todoRepositoryInterface)
    {
        $this->todoRepositoryInterface = $todoRepositoryInterface;
    }

    public function getAll($id)
    {
        $todos =  $this->todoRepositoryInterface->findAllDoneByUserId($id);

        return new GetTodosResponse($todos);
    }

}
