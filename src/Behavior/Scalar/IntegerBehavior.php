<?php

namespace Fasano\PHPrimitives\Behavior\Scalar;

use Fasano\PHPrimitives\Exception\InvalidBackingValue;

trait IntegerBehavior
{
    final public static function construct(mixed $value): static
    {
        if (!\is_integer($value)) {
            throw new InvalidBackingValue($value, static::class);
        }
        
        return new static($value);
    }

    final public function deconstruct(): int
    {
        return $this->value;
    }
}