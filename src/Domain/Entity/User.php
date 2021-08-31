<?php

namespace App\Domain\Entity;

class User
{
    public $user_name;
    public $email;
    public $id;

    public function __construct($user_name, $email)
    {
        $this->user_name = $user_name;
        $this->email = $email;
    }

    public function getUserName(): ?string
    {
        return $this->user_name;
    }

    public function setUserName(string $user_name): self
    {
        $this->user_name = $user_name;

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
