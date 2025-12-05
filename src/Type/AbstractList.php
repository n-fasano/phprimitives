<?php

namespace Contract\Primitives\Type;

use Contract\Primitives\Primitive;
use Contract\Primitives\Type;
use InvalidArgumentException;

/**
 * @template T
 */
abstract readonly class AbstractList implements Primitive
{
    /**
     * @var T[] $value
     */
    public array $value;

    /**
     * @param T[] $value
     */
    final public function __construct(array $value)
    {
        if (!array_is_list($value)) {
            throw new InvalidArgumentException('Invalid list.');
        }

        static::validate($value);
    }

    /**
     * @param T[] $value
     */
    abstract protected static function validate(array $value): void;

    public function getType(): Type
    {
        return Type::ARRAY;
    }
}