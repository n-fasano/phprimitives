<?php

namespace Fasano\PHPrimitives\Behavior\Enum;

use Fasano\PHPrimitives\Exception\InvalidBackingValue;
use Fasano\PHPrimitives\Behavior\Scalar\StringBehavior;

trait EnumStringBehavior
{
    use StringBehavior;

    /**
     * Accepts integers to gracefully handle (correct) PHP's odd behavior of casting numeric string array keys to integers.
     */
    final public static function construct(mixed $value): static
    {
        if (!\is_string($value) && !\is_integer($value)) {
            throw new InvalidBackingValue($value, static::class);
        }

        return static::tryFrom((string) $value)
            ?? throw new InvalidBackingValue($value, static::class);
    }
}