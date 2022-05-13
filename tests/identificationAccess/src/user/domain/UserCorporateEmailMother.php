<?php declare(strict_types=1);


namespace Siccob\Tests\identificationAccess\src\user\domain;


use Siccob\identificationAccess\user\domain\UserCorporateEmail;
use Siccob\Tests\shared\domain\MotherCreator;

final class UserCorporateEmailMother
{
    public static function create(string $value = null): UserCorporateEmail
    {
        return new UserCorporateEmail($value?? MotherCreator::random()->email());
    }

}