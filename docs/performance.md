Benchmarked a few options:

Option A (0.162s):

```php
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
```


Option B (0.275s):

```php
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
```


Option C (0.219s):

```php
function not_empty(string $value): bool
{
    return !empty($value);
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
```


Option D (0.465s):

```php
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
```