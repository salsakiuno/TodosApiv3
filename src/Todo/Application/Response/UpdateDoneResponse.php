<?php

namespace App\Todo\Application\Response;

class UpdateDoneResponse implements \JsonSerializable
{
    private $done;

    public function __construct(bool $done)
    {
        $this->done = $done;
    }

    public function getDone(): bool
    {
        return $this->done;
    }

    public function jsonSerialize(): array
    {
        return [
            'done' => $this->getDone()
        ];
    }
}
