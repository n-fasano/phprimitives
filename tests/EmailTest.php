<?php

namespace Fasano\PHPrimitives\Tests;

use Fasano\PHPrimitives\Tests\Implementation\Email;

class EmailTest extends PrimitiveTest
{
    protected string $primitiveFqcn { get => Email::class; }

    public static function cases(): iterable
    {
        yield 'Valid' => ['john.doe@example.com', true];
        
        yield 'Invalid #1' => ['john.doe', false];
        yield 'Invalid #2' => ['@example.com', false];
        yield 'Invalid #3' => ['john.doe@ example.com', false];
    }
}