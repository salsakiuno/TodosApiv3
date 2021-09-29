<?php

namespace App\User\Infrastructure\Repository;

use App\User\Domain\Entity\User;
use App\User\Domain\Repository\UserRepositoryInterface;
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

    public function findByUserName(string $userName): ?User
    {
        return $this->entityManager->getRepository(User::class)->findOneBy(['userName' => $userName]);
    }

    public function findAll(): ?array
    {
        return $this->entityManager->getRepository(User::class)->findAll();
    }
}
