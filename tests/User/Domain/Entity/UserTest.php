<?php
namespace test\Domain\Entity;

use App\User\Domain\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGetUserName()
    {
        $userName = 'test user';
        $userEmail = 'iHopeYouLikeItLuna@test.com';
        $user = new User($userName, $userEmail);
        $this->assertEquals($userName, $user->getUserName());
        
    }

    public function testGetUserEmail()
    {
        $userName = 'test user';
        $userEmail = 'iHopeYouLikeItLuna@test.com';
        $user = new User($userName, $userEmail);
        $this->assertEquals($userEmail, $user->getUserName());
        
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

    public function testGetUserNameAndChangeIt()
    {
        $userName = 'test user';
        $userEmail = 'iHopeYouLikeItLuna@test.com';
        $newUserName = 'testing is cool';
        
        $user = new User($userName, $userEmail);

        $this->assertEquals($userName, $user->getUserName());

        $user->setEmail($newUserName);

        $this->assertNotEquals($newUserName, $user->getUserName());
    }

}
