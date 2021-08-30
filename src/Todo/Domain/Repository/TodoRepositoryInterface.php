<?php

namespace App\Todo\Domain\Repository;

use App\Todo\Domain\Entity\Todo;

interface TodoRepositoryInterface
{
    public function save(Todo $todo): void;
    public function delete(Todo $todo): void;
    public function findByIdAndUserId(int $userId, int $todoId): ?Todo;
    public function findAllByUserId(int $id): array;
    public function findAllDoneByUserId(int $id): array;
    public function findAllNotDoneByUserId(int $id): array;
    public function findAll(): ?array;
}