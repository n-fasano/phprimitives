<?php

namespace Fasano\PHPrimitives\Behavior\Scalar;

use Fasano\PHPrimitives\Exception\InvalidBackingValue;

trait FloatBehavior
{
    final public static function construct(mixed $value): static
    {
        if (!\is_float($value)) {
            throw new InvalidBackingValue($value, static::class);
        }
        
        return new static($value);
    }

    final public function deconstruct(): float
    {
        return $this->value;
    }
}