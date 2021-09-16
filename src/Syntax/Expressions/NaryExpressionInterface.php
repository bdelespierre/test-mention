<?php

namespace Mention\Syntax\Expressions;

/**
 * @see https://en.wikipedia.org/wiki/Arity
 */
interface NaryExpressionInterface extends ExpressionInterface
{
    /**
     * @return array<ExpressionInterface>
     */
    public function getParts(): array;
}
