<?php declare(strict_types=1);


namespace Siccob\Tests\identificationAccess\src\user\domain;


use Siccob\identificationAccess\user\domain\UserLastname;
use Siccob\Tests\shared\domain\MotherCreator;

final class UserLastnameMother
{
    public static function create(string $value = null): UserLastname
    {
        return new UserLastname($value?? MotherCreator::random()->lastName());
    }

}