<?php

namespace Fasano\PHPrimitives\Contract\Primitive;

use Fasano\PHPrimitives\Contract\Primitive;

interface FloatPrimitive extends Primitive
{
    public function deconstruct(): float;
}