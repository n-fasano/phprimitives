<?php

namespace Fasano\PHPrimitives\Contract\Primitive;

use Fasano\PHPrimitives\Contract\Primitive;

interface BooleanPrimitive extends Primitive
{
    public function deconstruct(): bool;
}