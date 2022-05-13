<?php declare(strict_types=1);


namespace Siccob\identificationAccess\user\domain;


interface UserRepository
{
    public function searchNickname(UserNickname $nickname): ?User;
}