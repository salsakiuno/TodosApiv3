<?php

namespace App\Todo\Infrastructure\Controller;

use App\Todo\Application\UseCase\UpdateDoneUseCase;
use App\Todo\Application\Request\UpdateDoneRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UpdateDoneController
{
    private $updateDoneUseCase;

    public function __construct(UpdateDoneUseCase $updateDoneUseCase)
    {
        $this->updateDoneUseCase = $updateDoneUseCase;
    }

    public function update(Int $userId, Int $todoId, Request $request)
    {
        $updateDoneRequest = new UpdateDoneRequest(
            $userId,
            $todoId,
            $request->get('done')
        );

        return new JsonResponse($this->updateDoneUseCase->update($updateDoneRequest));
    }
}
