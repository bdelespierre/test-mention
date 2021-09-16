<?php

namespace Mention\Syntax\Expressions;

use Mention\Grammar\Tokens\Keyword;

class KeywordExpression implements UnaryExpressionInterface
{
    public function __construct(
        private Keyword $value
    ) {
    }

    public function toString(int $depth = 0): string
    {
        return (string) $this->value;
    }
}
