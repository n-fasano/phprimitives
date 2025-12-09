<?php

namespace Fasano\PHPrimitives;

use Fasano\PHPrimitives\Behavior\IntrospectibleBehavior;
use Fasano\PHPrimitives\Behavior\JsonSerializableBehavior;
use Fasano\PHPrimitives\Behavior\Scalar\StringBehavior;
use Fasano\PHPrimitives\Contract\Introspectible;
use Fasano\PHPrimitives\Contract\Primitive\StringPrimitive;
use JsonSerializable;

abstract readonly class AbstractString implements StringPrimitive, Introspectible, JsonSerializable
{
    use StringBehavior;
    use IntrospectibleBehavior;
    use JsonSerializableBehavior;

    final public function __construct(public string $value)
    {
        static::validate($value);
    }

    abstract protected static function validate(string $value): void;
}