<?php

namespace Siccob\identificationAccess\shared\infrastructure\doctrine;

use Doctrine\ORM\EntityManagerInterface;
use Siccob\shared\infrastructure\doctrine\DoctrineEntityManagerFactory;

class AdistEntityManagerFactory
{
    public static function create(array $parameters, string $environment): EntityManagerInterface
    {
        $isDevMode = 'prod' !== $environment;

        $prefixes = array_merge(
            DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../identificationAccess' , 'Siccob\identificationAccess')
        );
        $dbalCustomTypesClasses = DbalTypesSearcher::inPath(__DIR__ . '/../../../../identificationAccess' , 'identificationAccess');

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            $dbalCustomTypesClasses
        );
    }

}