<?php

namespace App\Todo\Application\Request;

class UpdateDoneRequest
{
    private $userId;
    private $id;
    private $done;

    public function __construct(int $id, int $userId, bool $done){
        $this->id = $id;
        $this->userId = $userId;
        $this->done = $done;
    }

    public function getDone(){
        return $this->done;
    }
    public function getId(){
        return $this->id;
    }
    public function getUserId(){
        return $this->userId;
    }

}

