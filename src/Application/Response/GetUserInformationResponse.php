<?php

namespace App\Application\Response;

class GetUserInformationResponse implements \JsonSerializable
{
    private $userId;
    private $userName;
    private $email;

    public function __construct(int $userId, string $userName, string $email)
    {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->email = $email;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getUserEmail()
    {
        return $this->email;
    }

    public function jsonSerialize(): array
    {
        return [
            'message' => 'User information retrieved',
            'id' => $this->getUserId(),
            'userName' => $this->getUserName(),
            'userEmail' =>$this->getUserEmail()
        ];
    }
}