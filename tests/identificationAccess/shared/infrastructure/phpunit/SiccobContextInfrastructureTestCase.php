<?php

namespace Siccob\Tests\identificationAccess\shared\infrastructure\phpunit;

use Siccob\Adist\Backend\AdistKernel;
use Siccob\Tests\shared\infrastructure\phpunit\InfrastructureTestCase;

abstract class SiccobContextInfrastructureTestCase extends InfrastructureTestCase
{
    private $service;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function getEntityManager()
    {
        return $this->service($this->service);
    }

    protected function kernelClass(): string
    {
        $this->service = 'adist_doctrine_repository';
        return AdistKernel::class;
    }

}