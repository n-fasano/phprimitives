<?php

interface Constraint
{
    public function validate(string $value): bool;
}

final readonly class NotEmpty implements Constraint
{
    public function validate(string $value): bool
    {
        return !empty($value);
    }
}

final readonly class Constraints
{
    public array $value;

    public function __construct(Constraint ...$value)
    {
        $this->value = $value;
    }
}

final readonly class Name
{
    public function __construct(public string $value)
    {
        $constraints = new Constraints(new NotEmpty());

        foreach ($constraints->value as $constraint) {
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