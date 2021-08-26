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

    public function findAllByUserId(int $id): array
    {
        $result = $this->entityManager->createQueryBuilder()
            ->from(Todo::class, 'todos')
            ->select('todos','todos.title', 'todos.description', 'todos.done')
            ->where('todos.userId = :id')
            ->setParameter('id', $id)
            ->getQuery()->getArrayResult();

        return $result;
    }

    public function findAllDoneByUserId(int $id): array
    {
        $result = $this->entityManager->createQueryBuilder()
            ->from(Todo::class, 'todos')
            ->select('todos','todos.title', 'todos.description', 'todos.done')
            ->andwhere('todos.userId = :id AND todos.done = :done')
            ->setParameter('id', $id)
            ->setParameter('done', true)
            ->getQuery()->getArrayResult();

        return $result;
    }

    public function findAllNotDoneByUserId(int $id): array
    {
        $result = $this->entityManager->createQueryBuilder()
            ->from(Todo::class, 'todos')
            ->select('todos','todos.title', 'todos.description', 'todos.done')
            ->andwhere('todos.userId = :id AND todos.done = :done')
            ->setParameter('id', $id)
            ->setParameter('done', false)
            ->getQuery()->getArrayResult();

        return $result;
    }

}
