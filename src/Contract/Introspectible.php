<?php

namespace Fasano\PHPrimitives\Contract;

use Throwable;

interface Introspectible
{
    public static function try(mixed $value): ?static;
    public static function error(mixed $value): ?Throwable;
    public static function accepts(mixed $value): bool;
}