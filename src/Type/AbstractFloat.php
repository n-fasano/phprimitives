<?php

namespace Contract\Primitives\Type;

use Contract\Primitives\Primitive;
use Contract\Primitives\Type;

abstract readonly class AbstractFloat implements Primitive
{
    final public function __construct(public float $value)
    {
        static::validate($value);
    }

    abstract protected static function validate(float $value): void;

    public function getType(): Type
    {
        return Type::FLOAT;
    }
}