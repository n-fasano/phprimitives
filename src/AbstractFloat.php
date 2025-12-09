<?php

namespace Fasano\PHPrimitives;

use Fasano\PHPrimitives\Behavior\IntrospectibleBehavior;
use Fasano\PHPrimitives\Behavior\JsonSerializableBehavior;
use Fasano\PHPrimitives\Behavior\Scalar\FloatBehavior;
use Fasano\PHPrimitives\Contract\Introspectible;
use Fasano\PHPrimitives\Contract\Primitive\FloatPrimitive;
use JsonSerializable;

abstract readonly class AbstractFloat implements FloatPrimitive, Introspectible, JsonSerializable
{
    use FloatBehavior;
    use IntrospectibleBehavior;
    use JsonSerializableBehavior;

    final public function __construct(public float $value)
    {
        static::validate($value);
    }

    abstract protected static function validate(float $value): void;
}