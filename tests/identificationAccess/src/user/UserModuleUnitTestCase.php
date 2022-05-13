<?php

namespace Siccob\Tests\identificationAccess\src\user;

use PHPUnit\Framework\TestCase;
use Siccob\identificationAccess\user\domain\User;
use Siccob\identificationAccess\user\domain\UserRepository;
use Siccob\Tests\identificationAccess\src\user\domain\UserMother;

class UserModuleUnitTestCase extends TestCase
{

    private $repository;
    public function repository(): UserRepository
    {
        return $this->repository = $this->repository ?? $this->createMock(UserRepository::class);
    }

    public function userNoExist(): void
    {
        $this->repository()
            ->method('searchNickname')
            ->will($this->returnCallback(function () {
                return null;
            }));
    }

    public function searchNickname(User $user = null): void
    {
        $this->repository()
            ->method('searchNickname')
            ->will($this->returnCallback(function () use ($user){
                return $user ?? UserMother::create();
            }));
    }

}