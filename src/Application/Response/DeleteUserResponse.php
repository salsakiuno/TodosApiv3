<?php

namespace App\Application\Response;

class DeleteUserResponse implements \JsonSerializable
{
    private $userName;
    private $email;

    public function __construct(string $userName, string $email)
    {
        $this->userName = $userName;
        $this->email = $email;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getEmail()
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
