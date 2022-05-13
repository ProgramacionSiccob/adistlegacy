<?php declare(strict_types=1);


namespace Siccob\Tests\identificationAccess\src\user\domain;


use Siccob\identificationAccess\user\domain\UserPassword;
use Siccob\Tests\shared\domain\MotherCreator;

final class UserPasswordMother
{
    public static function create(string $value = null): UserPassword
    {
        return new UserPassword($value?? MotherCreator::random()->password());
    }

}