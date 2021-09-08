<?php

namespace App\User\Application\Response;

class DeleteUserResponse implements \JsonSerializable
{
    private string $userName;
    private string $email;

    public function __construct(string $userName, string $email)
    {
        $this->userName = $userName;
        $this->email = $email;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function jsonSerialize(): array
    {
        return [
            'message' => 'User deteleted correctly',
            'user' => $this->getUserName(),
            'email' => $this->getEmail()
        ];
    }
}
