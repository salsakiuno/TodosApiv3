<?php

namespace App\Domain\Entity;


class User
{
    private $id;
    private $user_name;
    private $email;

    public function __construct($user_name, $email)
    {
        $this->user_name = $user_name;
        $this->email = $email;
    }

    public function getId(): ?int
    {
        return $this->id;
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
