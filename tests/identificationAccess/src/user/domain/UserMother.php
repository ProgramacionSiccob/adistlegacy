<?php declare(strict_types=1);


namespace Siccob\Tests\identificationAccess\src\user\domain;


use Siccob\identificationAccess\user\domain\User;
use Siccob\identificationAccess\user\domain\UserCorporateEmail;
use Siccob\identificationAccess\user\domain\UserEmail;
use Siccob\identificationAccess\user\domain\UserId;
use Siccob\identificationAccess\user\domain\UserLastname;
use Siccob\identificationAccess\user\domain\UserName;
use Siccob\identificationAccess\user\domain\UserNickname;
use Siccob\identificationAccess\user\domain\UserPassword;
use Siccob\identificationAccess\user\domain\UserProfile;
use Siccob\identificationAccess\user\domain\UserStatus;

final class UserMother
{
    public static function create(
        UserId             $id = null ,
        UserNickname       $nickname = null ,
        UserPassword       $password = null ,
        UserName           $name = null ,
        UserLastname       $lastname = null ,
        UserEmail          $email = null ,
        UserCorporateEmail $corporateEmail = null ,
        UserProfile        $profile = null ,
        UserStatus         $status = null
    ): User
    {
        return new User(
            $id ?? UserIdMother::create() ,
            $nickname ?? UserNicknameMother::create() ,
            $password ?? UserPasswordMother::create() ,
            $name ?? UserNameMother::create() ,
            $lastname ?? UserLastnameMother::create() ,
            $email ?? UserEmailMother::create() ,
            $corporateEmail ?? UserCorporateEmailMother::create() ,
            $profile ?? UserProfileMother::create() ,
            $status ?? UserStatusMother::create()
        );
    }

    public static function setUser(
        string $id ,
        string $nickname ,
        string $password ,
        string $name ,
        string $lastname ,
        string $email
    ): User
    {
        $password = password_hash($password , PASSWORD_DEFAULT);
        return self::create(
            UserIdMother::create($id) ,
            UserNicknameMother::create($nickname) ,
            UserPasswordMother::create($password) ,
            UserNameMother::create($name) ,
            UserLastnameMother::create($lastname) ,
            UserEmailMother::create($email) ,
            UserCorporateEmailMother::create($email) ,
            UserProfileMother::create() ,
            UserStatusMother::create('1')
        );
    }

    public static function setUserDisable(string $password, string $status): User
    {
        $password = password_hash($password , PASSWORD_DEFAULT);
        return self::create(
            UserIdMother::create() ,
            UserNicknameMother::create() ,
            UserPasswordMother::create($password) ,
            UserNameMother::create() ,
            UserLastnameMother::create() ,
            UserEmailMother::create() ,
            UserCorporateEmailMother::create() ,
            UserProfileMother::create() ,
            UserStatusMother::create($status)
        );
    }
}