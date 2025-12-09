<?php

namespace Fasano\PHPrimitives\Contract\Primitive;

use Fasano\PHPrimitives\Contract\Primitive;

interface IntegerPrimitive extends Primitive
{
    public function deconstruct(): int;
}