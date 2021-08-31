<?php

namespace App\Domain\Repository;

use App\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function save(User $user): void;
    public function delete(User $user): void;
    public function findByEmail(string $email): ?User;
    public function findById(int $id): ?User;
    public function findAll(): ?array;
}