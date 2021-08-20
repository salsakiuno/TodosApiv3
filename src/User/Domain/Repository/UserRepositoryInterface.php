<?php

namespace App\User\Domain\Repository;

use App\User\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function save(User $user): void;
    public function delete(User $user): void;
    public function findByEmail(string $email): ?User;
    public function findById(int $id): ?User;
    public function findAll(): ?array;
}