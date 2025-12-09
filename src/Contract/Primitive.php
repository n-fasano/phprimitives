<?php

namespace Fasano\PHPrimitives\Contract;

use InvalidArgumentException;

interface Primitive
{
    /** 
     * @throws InvalidArgumentException
     */
    public static function construct(int|float|bool|string $value): static;

    public function deconstruct(): int|float|bool|string;
}