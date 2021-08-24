<?php

namespace App\Todo\Domain\Repository;

use App\Todo\Domain\Entity\Todo;

interface TodoRepositoryInterface
{
    public function save(Todo $todo): void;
    public function delete(Todo $todo): void;
    public function findById(int $id): ?Todo;
    public function findAll(): ?array;
}