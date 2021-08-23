<?php
namespace test\Domain\Entity;

use App\User\Domain\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGetUserData()
    {
        $userName = 'test user';
        $userEmail = 'iHopeYouLikeItLuna@test.com';
        $user = new User($userName, $userEmail);
        $this->assertEquals('test user', $user->getUserName());
        
    }

    public function testGetUserEmailAndChangeIt()
    {
        $userName = 'test user';
        $userEmail = 'iHopeYouLikeItLuna@test.com';
        $newEmail = 'iHopeRubenLikesIt@test.com';

        $user = new User($userName, $userEmail);
        $this->assertEquals($userEmail, $user->getEmail());

        $user->setEmail($newEmail);

        $this->assertEquals($newEmail, $user->getEmail());

    }

}