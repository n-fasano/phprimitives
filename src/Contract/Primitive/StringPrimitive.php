<?php

namespace Fasano\PHPrimitives\Contract\Primitive;

use Fasano\PHPrimitives\Contract\Primitive;

interface StringPrimitive extends Primitive
{
    public function deconstruct(): string;
}