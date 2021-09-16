<?php

namespace Mention\Grammar\Tokens;

class NamespaceSeparator implements TokenInterface
{
    public function __toString(): string
    {
        return ':';
    }
}
