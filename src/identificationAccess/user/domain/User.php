<?php declare(strict_types=1);


namespace Siccob\identificationAccess\user\domain;


use Siccob\shared\domain\aggregate\AggregateRoot;

final class User extends AggregateRoot
{

    private $id;
    private $nickname;
    private $password;
    private $name;
    private $lastname;
    private $profile;
    private $status;
    private $email;
    private $corporateEmail;

    public function __construct(
        UserId             $id ,
        UserNickname       $nickname ,
        UserPassword       $password ,
        UserName           $name ,
        UserLastname       $lastname ,
        UserEmail          $email ,
        UserCorporateEmail $corporateEmail ,
        UserProfile        $profile ,
        UserStatus         $status
    )
    {
        $this->id = $id;
        $this->nickname = $nickname;
        $this->password = $password;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->corporateEmail = $corporateEmail;
        $this->profile = $profile;
        $this->status = $status;
    }

    public function getId(): string
    {
        return $this->id->value();
    }

    public function hasNotValidPassword(string $password): bool
    {
        return !$this->password->isValid($password);
    }

    public function getData(): array
    {
        return [
            'name' => $this->name->value() ,
            'lastname' => $this->lastname->value() ,
            'profile' => $this->profile->value()
        ];
    }

    public function isDisable(): bool
    {
        if ($this->status->value() === '0') {
            return true;
        }

        return false;
    }
}