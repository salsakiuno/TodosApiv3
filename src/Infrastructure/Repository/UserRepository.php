<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\User;
use App\Domain\Repository\UserRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class UserRepository implements UserRepositoryInterface
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
    public function findUser(int $userId): ?User
    {
        return $this->entityManager->getRepository(User::class)->findOneBy(['id' => $userId]);
    }
    public function findAll(): ?array
    {
        return $this->entityManager->getRepository(User::class)->findAll();
    }

}
