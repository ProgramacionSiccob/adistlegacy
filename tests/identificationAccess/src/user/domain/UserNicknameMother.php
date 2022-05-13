<?php declare(strict_types=1);


namespace Siccob\Tests\identificationAccess\src\user\domain;


use Siccob\identificationAccess\user\domain\UserNickname;
use Siccob\Tests\shared\domain\MotherCreator;

final class UserNicknameMother
{
    public static function create(string $value = null): UserNickname
    {
        return new UserNickname($value ?? MotherCreator::random()->userName());
    }
}