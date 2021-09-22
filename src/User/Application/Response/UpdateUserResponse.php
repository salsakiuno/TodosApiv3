<?php

namespace App\User\Application\Response;

class UpdateUserResponse implements \JsonSerializable
{
    private int $userId;
    private string $userName;
    private string $userEmail;

    public function __construct(int $userId, string $userName, string $userEmail)
    {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->userEmail = $userEmail;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    public function jsonSerialize(): array
    {
        return [
            'message' => 'User updated correctly',
            'id' => $this->getUserId(),
            'userName' => $this->getUserName(),
            'userEmail' => $this->getUserEmail()
        ];
    }
}
