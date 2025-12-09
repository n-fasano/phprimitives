<?php

namespace Fasano\PHPrimitives\Behavior\Scalar;

use Fasano\PHPrimitives\Exception\InvalidBackingValue;

trait StringBehavior
{
    final public static function construct(mixed $value): static
    {
        if (!\is_string($value)) {
            throw new InvalidBackingValue($value, static::class);
        }
        
        return new static($value);
    }

    final public function deconstruct(): string
    {
        return $this->value;
    }
}