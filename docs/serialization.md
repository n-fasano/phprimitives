This works out of the box:

```php
final readonly class Person
{
    public function __construct(
        public Name $name,
        public Active $active,
        public Age $age,
        public Money $money,
    ) {}
}

echo json_encode(new Person(
    new Name('John'),
    new Active(true),
    new Age(18),
    new Money(1000),
));
```