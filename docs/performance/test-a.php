<?php

final readonly class Name
{
    public function __construct(public string $value)
    {
        if (empty($value)) {
            throw new InvalidArgumentException();
        }
    }
}

for ($i = 0; $i < 1_000_000; $i++) {
    $name = new Name('Johnny');
    $name->value;
}