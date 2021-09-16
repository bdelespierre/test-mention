<?php

namespace Mention;

use Mention\Grammar\Tokens\Keyword;
use Mention\Grammar\Tokens\LogicalOperator;
use Mention\Syntax\Expressions\ExpressionInterface;
use Mention\Syntax\Expressions\KeywordExpression;
use Mention\Syntax\Expressions\LogicalExpression;
use Mention\Syntax\Expressions\NaryExpressionInterface;
use Mention\Syntax\Expressions\OrExpression;
use Mention\Syntax\Expressions\UnaryExpressionInterface;

class BooleanRequest
{
    public function __construct(
        private ExpressionInterface $expression,
    ) {
    }

    public function __toString()
    {
        return $this->expression->toString();
    }

    public function or(Keyword $keyword): void
    {
        $keywordExpr = new KeywordExpression($keyword);

        if ($this->expression instanceof OrExpression) {
            $this->expression = new OrExpression(...[...$this->expression->getParts(), $keywordExpr]);
            return;
        }

        $this->expression = new OrExpression($this->expression, $keywordExpr);
    }
}
