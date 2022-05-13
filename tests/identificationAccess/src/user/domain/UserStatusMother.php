<?php declare(strict_types=1);


namespace Siccob\Tests\identificationAccess\src\user\domain;


use Siccob\identificationAccess\user\domain\UserStatus;
use Siccob\Tests\shared\domain\MotherCreator;

final class UserStatusMother
{
    public static function create(string $value = null): UserStatus
    {
        return new UserStatus($value ?? strval(MotherCreator::random()->numberBetween(0 , 1)));
    }

}