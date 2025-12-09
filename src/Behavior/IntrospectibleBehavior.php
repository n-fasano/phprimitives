<?php

namespace Fasano\PHPrimitives\Behavior;

use Throwable;

trait IntrospectibleBehavior
{
    abstract public static function construct(mixed $value): static;

    public static function try(mixed $value): ?static
    {
        try {
            return static::construct($value);
        } catch (Throwable) {
            return null;
        }
    }

    public static function error(mixed $value): ?Throwable
    {
        try {
            static::construct($value);
            return null;
        } catch (Throwable $e) {
            return $e;
        }
    }

    public static function accepts(mixed $value): bool
    {
        return static::try($value) !== null;
    }
}