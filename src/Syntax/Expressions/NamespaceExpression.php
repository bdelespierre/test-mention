<?php

namespace Mention\Syntax\Expressions;

use Mention\Grammar\Tokens\Identifier;
use Mention\Grammar\Tokens\NamespaceSeparator;

class NamespaceExpression implements UnaryExpressionInterface
{
    /**
     * @var array<Identifier>
     */
    private array $identifiers;

    public function __construct(Identifier ...$identifiers)
    {
        $this->identifiers = $identifiers;
    }

    public function toString(int $depth = 0): string
    {
        return implode(new NamespaceSeparator(), $this->identifiers);
    }
}
