<?php

namespace Fasano\PHPrimitives\Tests\Implementation;

use Fasano\PHPrimitives\AbstractInteger;
use Fasano\PHPrimitives\Exception\InvalidBackingValue;

readonly class Age extends AbstractInteger
{
    protected static function validate(int $value): void
    {
        if ($value <= 0 || 120 <= $value) {
            throw new InvalidBackingValue($value, static::class);
        }
    }
}