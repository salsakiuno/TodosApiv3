<?php

namespace App\User\Application\Response;

class CreateUserResponse implements \JsonSerializable
{
    private int $userId;
    private string $userName;

    public function __construct(int $userId, string $userName)
    {
        $this->userId = $userId;
        $this->userName = $userName;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function jsonSerialize(): array
    {
        return [
            'message' => 'User created correctly',
            'id' => $this->getUserId(),
            'userName' => $this->getUserName()
        ];
    }
}
