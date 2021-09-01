<?php 

namespace App\Todo\Application\UseCase;

use App\Todo\Domain\Repository\TodoRepositoryInterface;
use App\Todo\Application\Request\UpdateTodoRequest;
use App\Todo\Application\Request\UpdateDoneRequest;
use App\Todo\Application\Response\UpdateTodoResponse;
use App\Todo\Application\Response\UpdateDoneResponse;

class UpdateTodoUseCase{

    public function __construct(TodoRepositoryInterface $todoRepositoryInterface)
    {
        $this->todoRepositoryInterface = $todoRepositoryInterface;
    }

    public function update(UpdateTodoRequest $request)
    {
        $todo = $this->todoRepositoryInterface->findByIdAndUserId(
            $request->getId(),
            $request->getUserId()   
        );

        $todo -> setTitle($request->getTitle())
              -> setDescription($request->getDescription());

        $this->todoRepositoryInterface->save($todo);

        return new UpdateTodoResponse(
            $todo->id,
            $todo->title,
            $todo->description);
    }

    public function updateDoneState(UpdateDoneRequest $request)
    {
        $todo = $this->todoRepositoryInterface->findByIdAndUserId(
            $request->getId(),
            $request->getUserId()   
        );

        $todo -> setDone($request->getDone());

        $this->todoRepositoryInterface->save($todo);

        return new UpdateDoneResponse(
            $todo->done);
    }

}

