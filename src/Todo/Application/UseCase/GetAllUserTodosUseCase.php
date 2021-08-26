<?php 

namespace App\Todo\Application\UseCase;

use App\Todo\Domain\Repository\TodoRepositoryInterface;
use App\Todo\Application\Response\GetTodosResponse;

class GetAllUserTodosUseCase
{
    public function __construct(TodoRepositoryInterface $todoRepositoryInterface)
    {
        $this->todoRepositoryInterface = $todoRepositoryInterface;
    }

    public function getAll($id)
    {
       $todos =  $this->todoRepositoryInterface->findAllByUserId($id);
        //($todos =  $this->todoRepositoryInterface->findAllDoneByUserId($id);
       // $todos =  $this->todoRepositoryInterface->findAllNotDoneByUserId($id);
        return new GetTodosResponse($todos);
    }

}

