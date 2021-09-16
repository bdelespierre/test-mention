<?php

namespace Mention\Syntax\Expressions;

use Mention\Grammar\Tokens\LogicalOperator;
use Mention\Grammar\Tokens\TokenInterface;

abstract class LogicalExpression implements ExpressionInterface
{
    private LogicalOperator $operator;

    /**
     * @var array<ExpressionInterface>
     */
    private array $parts;

    public function __construct(LogicalOperator $operator, ExpressionInterface ...$parts)
    {
        $this->operator = $operator;
        $this->parts = $parts;
    }

    public function toString(int $depth = 0): string
    {
        if (empty($this->getParts())) {
            return "";
        }

        if (count($this->getParts()) == 1) {
            return $this->getParts()[0]->toString($depth + 1);
        }

        $str = implode(
            " {$this->operator} ",
            array_map(fn($expr) => $expr->toString($depth + 1), $this->getParts())
        );

        if ($depth > 0) {
            return "({$str})";
        }

        return $str;
    }

    public function getOperator(): LogicalOperator
    {
        return $this->operator;
    }

    /**
     * @return array<ExpressionInterface>
     */
    public function getParts(): array
    {
        return $this->parts;
    }
}
