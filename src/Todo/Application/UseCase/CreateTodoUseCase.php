<?php 

namespace App\Todo\Application\UseCase;

use App\Todo\Domain\Repository\TodoRepositoryInterface;
use App\Todo\Domain\Entity\Todo;
use App\Todo\Application\Request\CreateTodoRequest;
use App\Todo\Application\Response\CreateTodoResponse;

class CreateTodoUseCase
{
    public function __construct(TodoRepositoryInterface $todoRepositoryInterface)
    {
        $this->todoRepositoryInterface = $todoRepositoryInterface;
    }

    public function create(CreateTodoRequest $request)
    {
        $todo = new Todo(
            $request->getTitle(),
            $request->getDescription(),
            $request->getUserId()
        );

        $this->todoRepositoryInterface->save($todo);
        $todoId = $this->todoRepositoryInterface->findById($request->getUserId());
        
        return new CreateTodoResponse($todoId->id);
    }

}

