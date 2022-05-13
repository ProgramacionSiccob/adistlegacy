<?php declare(strict_types=1);


namespace Siccob\identificationAccess\user\application\access;


final class SingInRequest
{

    private $nickname;
    private $password;

    public function __construct(string $nickname , string $password)
    {
        $this->nickname = $nickname;
        $this->password = $password;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}