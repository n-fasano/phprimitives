<?php

function not_empty(string $value): bool
{
    return !empty($value);
}

function has_space(string $value): bool
{
    return str_contains($value, ' ');
}

final readonly class Name
{
    public function __construct(public string $value)
    {
        foreach (['not_empty'] as $constraint) {
            if (!$constraint($value)) {
                throw new InvalidArgumentException;
            }
        }
    }
}

for ($i = 0; $i < 1_000_000; $i++) {
    $name = new Name('Johnny');
    $name->value;
}