<?php


namespace Siccob\shared\infrastructure\mailer;


use Siccob\shared\domain\mailer\exceptions\MailerNotSent;
use Siccob\shared\domain\mailer\Mailer;
use Siccob\shared\domain\mailer\MailerRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;

final class MailerSymfonyMailerRepository implements MailerRepository
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send(Mailer $email): void
    {
        list($to, $subject, $template, $context) = $email->getConfig();

        $email = (new TemplatedEmail())
            ->from('siccobsolutions@siccob.com.mx')
            ->to(...$to)
            ->subject($subject)
            ->htmlTemplate($template)
            ->context($context);
        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $exception) {
            throw new MailerNotSent($exception->getMessage());
        }
    }
}