<?php

namespace Mention\Grammar\Tokens;

use Mention\Expressions\ExpressionInterface;

/**
 * @see https://en.wikipedia.org/wiki/Lexical_analysis#Token
 */
interface TokenInterface
{
    public function __toString(): string;
}
