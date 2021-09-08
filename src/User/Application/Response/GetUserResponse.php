<?php

namespace App\User\Application\Response;

class GetUserResponse implements \JsonSerializable
{
    private int $userId;
    private string $userName;
    private string $email;

    public function __construct(int $userId, string $userName, string $email)
    {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->email = $email;
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
        return $this->email;
    }

    public function jsonSerialize(): array
    {
        return [
            'message' => 'User information retrieved',
            'id' => $this->getUserId(),
            'userName' => $this->getUserName(),
            'userEmail' =>$this->getUserEmail()
        ];
    }
}
