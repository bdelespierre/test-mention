<?php

namespace Mention\Syntax\Expressions;

use Mention\Grammar\Tokens\LogicalOperator;
use Mention\Grammar\Tokens\Operator;

class NotExpression extends LogicalExpression implements UnaryExpressionInterface
{
    public function __construct(ExpressionInterface $expr)
    {
        parent::__construct(LogicalOperator::not(), $expr);
    }

    public function toString(int $depth = 0): string
    {
        $str = parent::toString($depth + 1);

        return "{$this->getOperator()} {$str}";
    }
}
