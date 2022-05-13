<?php

namespace Siccob\shared\infrastructure\doctrine;

interface DoctrineCustomType
{
    /**
     * @return string
     */
    public function customTypeName(): string;
}