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

    public function getTitle(): self
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function setDone(bool $done): self
    {
        $this->done = $done;

        return $this;
    }

}
