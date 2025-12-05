<?php

namespace Contract\Primitives\Tests;

use Contract\Primitives\Type;
use Fasano\PhpUnitOop\Assert;
use Fasano\PhpUnitOop\TestCase;
use Fasano\PhpUnitOop\TestSuite;
use stdClass;
use ValueError;

class TypeTest extends TestSuite
{
    /**
     * @inheritDoc
     */
    public static function cases(): iterable
    {
        yield new FromVarSuccess(Type::STRING, '1');
        yield new FromVarSuccess(Type::INTEGER, 1);
        yield new FromVarSuccess(Type::FLOAT, 1.0);
        yield new FromVarSuccess(Type::BOOLEAN, true);
        yield new FromVarSuccess(Type::ARRAY, []);

        yield new FromVarFailure(new stdClass());
    }
}

final class FromVarSuccess extends TestCase
{
    public function __construct(
        public Type $type,
        public string|int|float|bool|array $value,
    ) {}

    public function verify(): void
    {
        Assert::equals($this->type, Type::fromVar($this->value));
    }
}

final class FromVarFailure extends TestCase
{
    public function __construct(
        public mixed $value,
    ) {}

    public function verify(): void
    {
        Assert::throws(
            new ValueError('"object" is not a valid backing value for enum Contract\Primitives\Type'),
            fn (): Type => Type::fromVar($this->value),
        );
    }
}