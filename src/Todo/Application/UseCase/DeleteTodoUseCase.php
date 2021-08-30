<?php 

namespace App\Todo\Application\UseCase;

use App\Todo\Domain\Repository\TodoRepositoryInterface;
use App\Todo\Application\Request\DeleteTodoRequest;
use App\Todo\Application\Response\DeleteTodoResponse;

class DeleteTodoUseCase{
    public function __construct(TodoRepositoryInterface $todoRepositoryInterface)
    {
        $this->todoRepositoryInterface = $todoRepositoryInterface;
    }

    public function delete(DeleteTodoRequest $request)
    {

        $todo = $this->todoRepositoryInterface->findByIdAndUserId(
            $request->getId(),
            $request->getUserId()   
        );
        $this->todoRepositoryInterface->delete($todo);
        
        var_dump($todo);
        
        return new DeleteTodoResponse($todo->title);
    }
}

