<?php

namespace App\Todo\Infrastructure\Repository;

use App\Todo\Domain\Entity\Todo;
use App\Todo\Domain\Repository\TodoRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class TodoRepository implements TodoRepositoryInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(Todo $todo): void
    {
        $this->entityManager->persist($todo);
        $this->entityManager->flush();
    }

    public function delete(Todo $todo): void
    {
        $this->entityManager->remove($todo);
        $this->entityManager->flush();

    }

    public function findById(int $userId): ?Todo
    {
        return $this->entityManager->getRepository(Todo::class)->findOneBy(['userId' => $userId]);
    }

    public function findAll(): ?array
    {
        return $this->entityManager->getRepository(Todo::class)->findAll();
    }

}
