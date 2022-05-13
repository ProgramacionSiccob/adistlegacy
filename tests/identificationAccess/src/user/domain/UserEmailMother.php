<?php declare(strict_types=1);


namespace Siccob\Tests\identificationAccess\src\user\domain;


use Siccob\identificationAccess\user\domain\UserEmail;
use Siccob\Tests\shared\domain\MotherCreator;

final class UserEmailMother
{
    public static function create(string $value = null): UserEmail
    {
        return new UserEmail($value?? MotherCreator::random()->email());
    }

}