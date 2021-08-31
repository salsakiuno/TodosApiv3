<?php

namespace App\User\Infrastructure\Repository;

use App\User\Domain\Entity\User;
use App\Todo\Domain\Entity\Todo;
use App\Todo\Infrastructure\Repository\TodoRepository;
use App\User\Domain\Repository\UserRepositoryInterface;
use App\Todo\Domain\Repository\TodoRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class UserRepository implements UserRepositoryInterface
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function delete(User $user): void
    {
        $deleteTodo = new TodoRepository($this->entityManager);
        $deleteTodo->deleteAllByUserId($user->id);
        $this->entityManager->remove($user);
        $this->entityManager->flush();
    }

    public function save(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function findById(int $id): ?User
    {
        return $this->entityManager->getRepository(User::class)->findOneBy(['id' => $id]);
    }

    public function findByEmail(string $email): ?User
    {
        return $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
    }

    public function findAll(): ?array
    {
        return $this->entityManager->getRepository(User::class)->findAll();
    }
}
