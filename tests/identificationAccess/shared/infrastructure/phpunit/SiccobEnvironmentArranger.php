<?php

namespace Siccob\Tests\identificationAccess\shared\infrastructure\phpunit;

use Doctrine\ORM\EntityManager;
use Siccob\Tests\shared\infrastructure\arranger\EnvironmentArranger;
use Siccob\Tests\shared\infrastructure\doctrine\MySqlDatabaseCleaner;
use function Lambdish\Phunctional\apply;

final class SiccobEnvironmentArranger implements EnvironmentArranger
{

    private $SICCOBEntityManager;

    public function __construct(EntityManager $SICCOBEntityManager)
    {
        $this->SICCOBEntityManager = $SICCOBEntityManager;
    }

    public function arrange(): void
    {
        apply(new MySqlDatabaseCleaner() , [$this->SICCOBEntityManager]);
    }

    public function close(): void
    {
    }

}