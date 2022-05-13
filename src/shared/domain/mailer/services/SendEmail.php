<?php


namespace Siccob\shared\domain\mailer\services;


use Siccob\shared\domain\mailer\Mailer;
use Siccob\shared\domain\mailer\MailerRepository;

final class SendEmail
{
    private $emailRepository;

    public function __construct(MailerRepository $emailRepository)
    {
        $this->emailRepository = $emailRepository;
    }

    public function __invoke(Mailer $email): void
    {
        $this->emailRepository->send($email);
    }
}