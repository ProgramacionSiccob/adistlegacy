<?php declare(strict_types=1);


namespace Siccob\identificationAccess\user\domain\exceptions;


use Siccob\shared\domain\DomainError;

final class DisableUser extends DomainError
{
    public function errorCode(): string
    {
        return '403';
    }

    public function errorMessage(): string
    {
        return 'Usuario no existe';
    }
}