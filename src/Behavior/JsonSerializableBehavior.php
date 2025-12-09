<?php

namespace Fasano\PHPrimitives\Behavior;

trait JsonSerializableBehavior
{
	public function jsonSerialize(): float
    {
        return $this->value;
    }
}