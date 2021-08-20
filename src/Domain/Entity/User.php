<?php

namespace App\Domain\Entity;

class User
{
    private $user_name;
    private $email;
    public $id;

    public function __construct($user_name, $email)
    {
        $this->user_name = $user_name;
        $this->email = $email;
    }
}
