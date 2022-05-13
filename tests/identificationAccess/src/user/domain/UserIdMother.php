<?php declare(strict_types=1);


namespace Siccob\Tests\identificationAccess\src\user\domain;


use Siccob\identificationAccess\user\domain\UserId;
use Siccob\Tests\shared\domain\MotherCreator;

final class UserIdMother
{
    public static function create(string $value = null): UserId
    {
        return new UserId($value ?? strval(MotherCreator::random()->numberBetween(1,10)));
    }

}