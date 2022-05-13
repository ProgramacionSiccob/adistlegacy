<?php


namespace Siccob\Tests\shared\infrastructure\moduleUnitTestCase;


use PHPUnit\Framework\TestCase;
use Siccob\shared\domain\mailer\MailerRepository;

class MailerModuleUnitTestCase extends TestCase
{

    private $repository;

    public function repository(): MailerRepository
    {
        return $this->repository = $this->repository ?? $this->createMock(MailerRepository::class);
    }
}