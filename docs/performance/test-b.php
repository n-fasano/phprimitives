<?php

final readonly class NotEmpty
{
    public function validate(string $value): bool
    {
        return !empty($value);
    }
}

final readonly class Name
{
    public function __construct(public string $value)
    {
        foreach ([new NotEmpty()] as $constraint) {
            if (!$constraint->validate($value)) {
                throw new InvalidArgumentException;
            }
        }
    }
}

for ($i = 0; $i < 1_000_000; $i++) {
    $name = new Name('Johnny');
    $name->value;
}