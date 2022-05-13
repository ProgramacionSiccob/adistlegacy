<?php


namespace Siccob\shared\domain\mailer;


interface MailerRepository
{
    /**
     * @param Mailer $email
     * @return void
     */
    public function send(Mailer $email): void;
}