<?php

namespace Siccob\Tests\shared\infrastructure\arranger;

interface EnvironmentArranger
{
    public function arrange(): void;

    public function close(): void;
}