<?php

namespace App\Application\Response;

class UpdateUserResponse implements \JsonSerializable
{
    private $userId;
    private $userName;
    private $userEmail;

    public function __construct(int $userId, string $userName, string $userEmail)
    {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->userEmail = $userEmail;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getUserEmail()
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