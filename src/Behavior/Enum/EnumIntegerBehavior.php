<?php

namespace Fasano\PHPrimitives\Behavior\Enum;

use Fasano\PHPrimitives\Exception\InvalidBackingValue;
use Fasano\PHPrimitives\Behavior\Scalar\IntegerBehavior;

trait EnumIntegerBehavior
{
    use IntegerBehavior;

    final public static function construct(mixed $value): static
    {
        if (!\is_integer($value)) {
            throw new InvalidBackingValue($value, static::class);
        }
        
        return static::from($value);
    }
}