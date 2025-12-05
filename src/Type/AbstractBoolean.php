<?php

namespace Contract\Primitives\Type;

use Contract\Primitives\Primitive;
use Contract\Primitives\Type;

abstract readonly class AbstractBoolean implements Primitive
{
    final public function __construct(public bool $value)
    {
        static::validate($value);
    }

    abstract protected static function validate(bool $value): void;

    public function getType(): Type
    {
        return Type::BOOLEAN;
    }
}