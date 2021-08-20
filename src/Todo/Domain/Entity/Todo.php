<?php

namespace App\Todo\Domain\Entity;

class Todo
{
    public $title;
    public $description;
    public $done;
    public $user_id;
    public $id;

    public function __construct($title, $description, $user_id)
    {
        $this->title = $title;
        $this->description = $description;
        $this->user_id = $user_id;
    }

}
