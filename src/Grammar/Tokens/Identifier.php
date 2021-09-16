<?php

namespace Mention\Grammar\Tokens;

class Identifier implements TokenInterface
{
    private string $value;

    public function __construct(string $value)
    {
        assert(preg_match('/^[a-z0-9_-]+$/i', $value) == 1);

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
