<p align="center">
    <img src="phprimitives.png" width="300" height="300"/>
</p>

<p align="center">
    <i>Tools for building rich domain primitives in PHP.</i>
</p>

## Installation
```bash
composer require fasano/phprimitives
```

## What is this?

PHP has no base class for scalars - so there's nowhere to hook validation, enforce invariants,
or express domain meaning. PHPrimitives fills that gap with 4 base classes:

- [AbstractString](/src/AbstractString.php)
- [AbstractInteger](/src/AbstractInteger.php)
- [AbstractFloat](/src/AbstractFloat.php)
- [AbstractBoolean](/src/AbstractBoolean.php)

## How to use them?

Simply extend the base classes, and implement the `validate` method. Throw an `InvalidArgumentException` if the value is invalid.

```php
readonly class Email extends AbstractString
{
    protected static function validate(string $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email address: ' . $value);
        }
    }
}
```

## Why use them?

Primitives enforce invariants at the edges of your application. Validate at boundaries, trust everywhere else. Primitives convert to/from scalars at your application edges:

```php
# Input boundary - scalar to primitive
$age = new Age($request->input('age'));           # Throws if invalid
$email = new Email($request->input('email'));     # Throws if invalid
```

```php
# Everywhere else - work with primitives
function createUser(Email $email, Age $age): User
{
    # Type system guarantees correctness
    # No defensive checks required
}
```

```php
# Output boundary - primitive to scalar
$repository->save([
    'email' => $email->value,
    'age' => $age->value,
]);
```

**Without primitives**, validation scatters throughout your codebase:

```php
function createUser(string $email, int $age): void
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { /* ... */ }
    if ($age < 0 || 120 < $age) { /* ... */ }
    # Repeat in every function that touches these values
}
```

**Key benefits:**

- **Invariants enforced at construction** — Invalid data cannot enter your domain
- **Type safety through nominal typing** — Can't pass `Age` where `Temperature` is expected, even though both wrap integers
- **Domain concepts expressed clearly** — `Email` is more meaningful than `string`

## Serialization

Primitives implement `JsonSerializable` out of the box:
```php
echo json_encode(new Person(
    new Name('John'),
    new Age(18),
    new Email('john@example.com'),
));
// {"name":"John","age":18,"email":"john@example.com"}
```

## Ecosystem

The wrapping and unwrapping of values into primitive objects can be automated fairly trivially. You can find very simple libs to do so in Symfony and Doctrine below, along with a full example project that uses **no scalars anywhere**.

| Package | Description |
|---------|-------------|
| [phprimitives-doctrine](https://github.com/n-fasano/phprimitives-doctrine) | Doctrine DBAL type mappings |
| [phprimitives-symfony](https://github.com/n-fasano/phprimitives-symfony) | Symfony Serializer integration |
| [phprimitives-example](https://github.com/n-fasano/phprimitives-example) | An in-context example usage of PHPrimitives |