<?php

namespace Mention\Syntax\Expressions;

use Mention\Grammar\Tokens\LogicalOperator;

class AndExpression extends LogicalExpression implements NaryExpressionInterface
{
    public function __construct(ExpressionInterface ...$parts)
    {
        parent::__construct(LogicalOperator::and(), ...$parts);
    }
}
