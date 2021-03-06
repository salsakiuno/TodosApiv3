<?php

namespace App\User\Domain\Entity;

class User
{
    public string $userName;
    public string $email;
    public string $id;

    public function __construct(string $userName, string $email)
    {
        $this->userName = $userName;
        $this->email = $email;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
