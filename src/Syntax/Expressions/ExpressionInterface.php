<?php

namespace Mention\Syntax\Expressions;

use Mention\Grammar\Tokens\Litteral;

interface ExpressionInterface
{
    public function toString(int $depth = 0): string;
}
