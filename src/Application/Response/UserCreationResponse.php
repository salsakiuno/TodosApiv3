<?php

namespace App\Application\Response;

class UserCreationResponse 
{
    public function __construct(int $userId, string $userName)
    {
        $this->userId = $userId;
        $this->user_name = $userName;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getUserName()
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