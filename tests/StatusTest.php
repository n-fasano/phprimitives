<?php

namespace Fasano\PHPrimitives\Tests;

use Fasano\PHPrimitives\Tests\Implementation\Status;

class StatusTest extends PrimitiveTest
{
    protected string $primitiveFqcn { get => Status::class; }

    public static function cases(): iterable
    {
        yield 'Valid' => ['registered', true];
        
        yield 'Invalid' => ['created', false];
    }
}