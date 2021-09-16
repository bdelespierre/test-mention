<?php

namespace Mention\Syntax\Expressions;

use Mention\Grammar\Tokens\Litteral;

class LitteralExpression implements UnaryExpressionInterface
{
    public function __construct(
        private Litteral $value
    ) {
    }

    public function toString(int $depth = 0): string
    {
        return (string) $this->value;
    }
}
