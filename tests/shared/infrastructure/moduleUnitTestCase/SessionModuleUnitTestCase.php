<?php


namespace Siccob\Tests\shared\infrastructure\moduleUnitTestCase;


use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;

class SessionModuleUnitTestCase extends TestCase
{
    private $session;

    public function session(): SessionInterface
    {
        return $this->session = $this->session ?? new Session(new MockArraySessionStorage());
    }
}