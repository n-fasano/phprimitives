<?php

namespace Fasano\PHPrimitives\Exception;

use InvalidArgumentException;

class InvalidBackingValue extends InvalidArgumentException
{
    public function __construct(mixed $value, string $type, string $reason = '')
    {
        $valueType = \gettype($value);

        $message = \sprintf(
            'Invalid backing value for "%s": (%s) %s',
            $type,
            $valueType,
            match ($valueType) {
                'object', 'array' => json_encode($value),
                default => (string) $value,
            },
        );

        if (!empty($reason)) {
            $message .= " - {$reason}";
        }

        parent::__construct($message);
    }
}