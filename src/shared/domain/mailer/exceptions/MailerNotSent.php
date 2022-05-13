<?php


namespace Siccob\shared\domain\mailer\exceptions;


use Siccob\shared\domain\DomainError;

final class MailerNotSent extends DomainError
{
    private $errorOriginal;

    public function __construct(string $message)
    {
        $this->errorOriginal = $message;
        parent::__construct();
    }

    public function errorCode(): string
    {
        return '452';
    }

    public function errorMessage(): string
    {
        return 'No fue posible enviar el correo : ' . $this->errorOriginal;
    }
}