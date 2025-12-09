# PHPrimitives

Abstractions for building rich domain primitives in PHP.

## Installation
```bash
composer require fasano/phprimitives
```

### What is a Primitive?

Primitive objects wrap scalar values with domain-specific validation and type safety.

**The Pattern:**

Primitives enforce invariants at the edges of your application. Validate at boundaries, trust everywhere else. Primitives convert to/from scalars at your application edges:

```php
# Input boundary - scalar to primitive
$age = new Age($request->input('age'));           # Throws if invalid
$email = new Email($request->input('email'));     # Throws if invalid

# Everywhere else - work with primitives
function createUser(Email $email, Age $age): User
{
    # Type system guarantees correctness
    # No defensive checks required
}

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
    if ($age < 0 || $age > 150) { /* ... */ }
    # Repeat in every function that touches these values
}
```

**Key benefits:**

- **Invariants enforced at construction** — Invalid data cannot enter your domain
- **Type safety through nominal typing** — Can't pass `Age` where `Temperature` is expected, even though both wrap integers
- **Domain concepts expressed clearly** — `Email` is more meaningful than `string`

### Examples

- [Age (Integer)](/tests/Implementation/Age.php)
- [Email (String)](/tests/Implementation/Email.php)
- [Status (Enum)](/tests/Implementation/Status.php)