<?php

namespace Mention\Grammar\Tokens;

final class LogicalOperator implements TokenInterface
{
    private function __construct(
        private string $value
    ) {
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public static function or(): self
    {
        return new self('OR');
    }

    public static function and(): self
    {
        return new self('AND');
    }

    public static function not(): self
    {
        return new self('NOT');
    }
}
