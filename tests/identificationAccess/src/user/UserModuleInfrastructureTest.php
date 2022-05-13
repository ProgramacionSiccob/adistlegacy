<?php


namespace Siccob\Tests\identificationAccess\src\user;



use Siccob\identificationAccess\user\infrastructure\UserDoctrineRepository;
use Siccob\Tests\identificationAccess\shared\infrastructure\phpunit\SiccobContextInfrastructureTestCase;

class UserModuleInfrastructureTest extends SiccobContextInfrastructureTestCase
{
    protected function repository(): UserDoctrineRepository
    {
        return new UserDoctrineRepository($this->getEntityManager());
    }
}