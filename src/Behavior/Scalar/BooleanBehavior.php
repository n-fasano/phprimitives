<?php

namespace Fasano\PHPrimitives\Behavior\Scalar;

use Fasano\PHPrimitives\Exception\InvalidBackingValue;

trait BooleanBehavior
{
    final public static function construct(mixed $value): static
    {
        if (!\is_bool($value)) {
            throw new InvalidBackingValue($value, static::class);
        }
        
        return new static($value);
    }

    final public function deconstruct(): bool
    {
        return $this->value;
    }
}