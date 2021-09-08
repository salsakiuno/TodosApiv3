<?php

namespace App\User\Application\Request;

class UpdateUserRequest
{
    private string $userName;
    private string $email;
    private int $id;

    public function __construct(int $id, string $userName, string $email){
        $this->id = $id;
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
    public function getId(): int
    {
        return $this->id;
    }

}
