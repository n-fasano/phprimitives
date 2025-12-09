<?php

namespace Fasano\PHPrimitives\Tests;

use Fasano\PHPrimitives\Contract\Primitive;
use Fasano\PHPrimitives\Exception\InvalidBackingValue;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

abstract class PrimitiveTest extends TestCase
{
    /** @var class-string<Primitive> */
    abstract protected string $primitiveFqcn { get; }

    #[DataProvider('cases')]
    public function test(int|float|string|bool $value, bool $valid): void
    {
        if ($valid) {
            $this->expectNotToPerformAssertions();
        } else {
            $this->expectException(InvalidBackingValue::class);
        }

        $this->primitiveFqcn::construct($value);
    }

    abstract public static function cases(): iterable;
}