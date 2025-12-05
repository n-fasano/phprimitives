<?php

namespace Contract\Primitives\Type;

use Contract\Primitives\Primitive;
use Contract\Primitives\Type;
use InvalidArgumentException;

abstract readonly class AbstractDictionary implements Primitive
{
    /**
     * @var array<string, mixed> $value
     */
    final public function __construct(public array $value)
    {
        foreach ($value as $key => $item) {
            if (!\is_string($key)) {
                throw new InvalidArgumentException(sprintf(
                    'Non-string key found: %s', $key,
                ));
            }

            static::validate($item);
        }
    }

    abstract protected static function validate(mixed $value): void;

    public function getType(): Type
    {
        return Type::ARRAY;
    }
}
