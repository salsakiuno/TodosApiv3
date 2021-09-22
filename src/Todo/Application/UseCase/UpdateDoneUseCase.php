<?php 

namespace App\Todo\Application\UseCase;

use App\Todo\Domain\Repository\TodoRepositoryInterface;
use App\Todo\Application\Request\UpdateDoneRequest;
use App\Todo\Application\Response\UpdateDoneResponse;

class UpdateDoneUseCase{

    public function __construct(TodoRepositoryInterface $todoRepositoryInterface)
    {
        $this->todoRepositoryInterface = $todoRepositoryInterface;
    }

    public function update(UpdateDoneRequest $request)
    {
        $todo = $this->todoRepositoryInterface->findByIdAndUserId(
            $request->getId(),
            $request->getUserId()   
        );

        $todo->setDone($request->getDone());

        $this->todoRepositoryInterface->save($todo);

        return new UpdateDoneResponse($todo->done);
    }
}
