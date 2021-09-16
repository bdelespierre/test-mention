<?php

namespace Mention\Grammar\Tokens;

class Litteral implements TokenInterface
{
    public function __construct(
        private string $value,
    ) {
    }

    public function __toString(): string
    {
        return $this->shouldEscape() ? $this->escaped() : $this->value;
    }

    private function shouldEscape(): bool
    {
        return !preg_match('/^[a-z]+$/', $this->value);
    }

    private function escaped(): string
    {
        return "\"{$this->value}\"";
    }
}
