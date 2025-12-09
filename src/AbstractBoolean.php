<?php

namespace Fasano\PHPrimitives;

use Fasano\PHPrimitives\Behavior\IntrospectibleBehavior;
use Fasano\PHPrimitives\Behavior\JsonSerializableBehavior;
use Fasano\PHPrimitives\Behavior\Scalar\BooleanBehavior;
use Fasano\PHPrimitives\Contract\Introspectible;
use Fasano\PHPrimitives\Contract\Primitive\BooleanPrimitive;
use JsonSerializable;

abstract readonly class AbstractBoolean implements BooleanPrimitive, Introspectible, JsonSerializable
{
    use BooleanBehavior;
    use IntrospectibleBehavior;
    use JsonSerializableBehavior;

    final public function __construct(public bool $value)
    {
        static::validate($value);
    }

    protected static function validate(bool $value): void
    {
        // Rarely useful, but some formats expect a value to always be true/false.
    }
}