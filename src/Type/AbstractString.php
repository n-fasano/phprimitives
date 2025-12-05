<?php

namespace Contract\Primitives\Type;

use Contract\Primitives\Primitive;
use Contract\Primitives\Type;

abstract readonly class AbstractString implements Primitive
{
    final public function __construct(public string $value)
    {
        static::validate($value);
    }

    abstract protected static function validate(string $value): void;

    public function getType(): Type
    {
        return Type::STRING;
    }
}