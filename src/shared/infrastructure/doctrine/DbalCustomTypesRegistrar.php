<?php

namespace Siccob\shared\infrastructure\doctrine;

use Doctrine\DBAL\Types\Type;
use function Lambdish\Phunctional\each;

class DbalCustomTypesRegistrar
{
    /**
     * @var bool
     */
    private static $initialized = false;

    /**
     * @param array $dbalCustomTypesClasses
     * @return void
     */
    public static function register(array $dbalCustomTypesClasses): void
    {
        if (!self::$initialized) {
            each(self::registerType(), $dbalCustomTypesClasses);

            self::$initialized = true;
        }
    }

    /**
     * @return callable
     */
    private static function registerType(): callable
    {
        return static function ($dbalCustomTypesClasses): void {
            Type::addType($dbalCustomTypesClasses::customTypeName(), $dbalCustomTypesClasses);
        };
    }

}