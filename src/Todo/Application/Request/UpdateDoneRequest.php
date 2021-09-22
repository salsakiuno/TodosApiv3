<?php

namespace App\Todo\Application\Request;

class UpdateDoneRequest
{
    private int $userId;
    private int $id;
    private bool $done;

    public function __construct(int $id, int $userId, bool $done){
        $this->id = $id;
        $this->userId = $userId;
        $this->done = $done;
    }

    public function getDone(): bool
    {
        return $this->done;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getUserId(): int
    {
        return $this->userId;
    }

}
