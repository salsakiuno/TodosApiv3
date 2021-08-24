<?php

namespace App\Todo\Domain\Entity;

class Todo
{
    public $title;
    public $description;
    public $done;
    public $userId;
    public $id;

    public function __construct($title, $description, $userId)
    {
        $this->title = $title;
        $this->description = $description;
        $this->userId = $userId;
        $this->done = false;
    }

}
