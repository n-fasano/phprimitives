<?php

namespace Fasano\PHPrimitives\Behavior;

trait JsonSerializableBehavior
{
    abstract public function deconstruct(): int|float|bool|string;

	public function jsonSerialize(): int|float|bool|string
    {
        return $this->deconstruct();
    }
}