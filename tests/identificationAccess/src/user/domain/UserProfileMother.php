<?php declare(strict_types=1);


namespace Siccob\Tests\identificationAccess\src\user\domain;


use Siccob\identificationAccess\user\domain\UserProfile;
use Siccob\Tests\shared\domain\MotherCreator;

final class UserProfileMother
{
    public static function create(string $value = null): UserProfile
    {
        return new UserProfile($value?? MotherCreator::random()
                ->randomElement(['Administrador']));
    }

}