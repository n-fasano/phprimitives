<?php

namespace Fasano\PHPrimitives\Tests\Implementation;

use Fasano\PHPrimitives\Behavior\Enum\EnumStringBehavior;
use Fasano\PHPrimitives\Contract\Primitive\StringPrimitive;

enum Status: string implements StringPrimitive
{
    use EnumStringBehavior;

    case REGISTERED = 'registered';
    case DELETED = 'deleted';
}