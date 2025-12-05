<?php

namespace Contract\Primitives;

enum Type: string
{
    case STRING = 'string';
    case INTEGER = 'integer';
    case FLOAT = 'double';
    case BOOLEAN = 'boolean';
    case ARRAY = 'array';

    public static function fromVar(mixed $var): self
    {
        return self::from(\gettype($var));
    }
}