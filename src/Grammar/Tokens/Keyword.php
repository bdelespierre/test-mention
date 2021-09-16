<?php

namespace Mention\Grammar\Tokens;

final class Keyword implements TokenInterface
{
    private function __construct(
        private string $value,
    ) {
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public static function javascript(): self
    {
        return new self('javascript');
    }

    public static function python(): self
    {
        return new self('python');
    }

    public static function ruby(): self
    {
        return new self('ruby');
    }

    public static function php(): self
    {
        return new self('php');
    }

    public static function xss(): self
    {
        return new self('xss');
    }

    public static function csrf(): self
    {
        return new self('csrf');
    }
}
