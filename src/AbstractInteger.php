<?php

namespace Fasano\PHPrimitives;

use Fasano\PHPrimitives\Behavior\IntrospectibleBehavior;
use Fasano\PHPrimitives\Behavior\JsonSerializableBehavior;
use Fasano\PHPrimitives\Behavior\Scalar\IntegerBehavior;
use Fasano\PHPrimitives\Contract\Introspectible;
use Fasano\PHPrimitives\Contract\Primitive\IntegerPrimitive;
use JsonSerializable;

abstract readonly class AbstractInteger implements IntegerPrimitive, Introspectible, JsonSerializable
{
    use IntegerBehavior;
    use IntrospectibleBehavior;
    use JsonSerializableBehavior;

    final public function __construct(public int $value)
    {
        static::validate($value);
    }

    abstract protected static function validate(int $value): void;
}