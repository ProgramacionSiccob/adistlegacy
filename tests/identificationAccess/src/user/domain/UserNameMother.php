<?php declare(strict_types=1);


namespace Siccob\Tests\identificationAccess\src\user\domain;


use Siccob\identificationAccess\user\domain\UserName;
use Siccob\Tests\shared\domain\MotherCreator;

final class UserNameMother
{
    public static function create(string $value = null): UserName
    {
        return new UserName($value?? MotherCreator::random()->name());
    }

}