<?php

namespace Fasano\PHPrimitives\Tests;

use Fasano\PHPrimitives\Tests\Implementation\Age;

class AgeTest extends PrimitiveTest
{
    protected string $primitiveFqcn { get => Age::class; }

    public static function cases(): iterable
    {
        yield 'Valid' => [21, true];
        
        yield 'Zero' => [0, false];
        yield 'Negative' => [-1, false];
        yield 'Too large' => [121, false];
    }
}