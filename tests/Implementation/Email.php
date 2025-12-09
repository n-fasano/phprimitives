<?php

namespace Fasano\PHPrimitives\Tests\Implementation;

use Fasano\PHPrimitives\AbstractString;
use Fasano\PHPrimitives\Exception\InvalidBackingValue;

readonly class Email extends AbstractString
{
    protected static function validate(string $value): void
    {
        if (!preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i', $value)) {
            throw new InvalidBackingValue($value, static::class);
        }
    }
}