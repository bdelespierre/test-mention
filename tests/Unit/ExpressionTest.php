<?php

namespace Tests\Unit;

use Mention\Grammar\Tokens\Identifier;
use Mention\Grammar\Tokens\Keyword;
use Mention\Grammar\Tokens\Litteral;
use Mention\Grammar\Tokens\NamespaceSeparator;
use Mention\Syntax\Expressions\AndExpression;
use Mention\Syntax\Expressions\ExpressionInterface;
use Mention\Syntax\Expressions\KeywordExpression;
use Mention\Syntax\Expressions\LitteralExpression;
use Mention\Syntax\Expressions\NamespaceExpression;
use Mention\Syntax\Expressions\NotExpression;
use Mention\Syntax\Expressions\OrExpression;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Mention\BinaryExpression
 * @uses Mention\Operator
 * @uses Mention\Value
 */
class ExpressionTest extends TestCase
{
    /**
     * @covers ::__constructor
     * @covers ::__toString
     * @covers ::toString
     * @dataProvider toStringDataProvider
     */
    public function testToString(
        string $expected,
        ExpressionInterface $expression
    ): void {
        $this->assertEquals(
            $expected,
            $expression->toString(),
        );
    }

    /**
     * @return array<mixed>
     */
    public function toStringDataProvider(): array
    {
        return [
            'Complex expression' => [
                'expected' => '(javascript OR (python AND ruby) OR php OR "C#") AND NOT (xss OR csrf) AND lang:en',
                'expression' => new AndExpression(
                    new OrExpression(
                        new KeywordExpression(Keyword::javascript()),
                        new AndExpression(
                            new KeywordExpression(Keyword::python()),
                            new KeywordExpression(Keyword::ruby()),
                        ),
                        new KeywordExpression(Keyword::php()),
                        new LitteralExpression(
                            new Litteral('C#')
                        ),
                    ),
                    new NotExpression(
                        new OrExpression(
                            new KeywordExpression(Keyword::xss()),
                            new KeywordExpression(Keyword::csrf()),
                        ),
                    ),
                    new NamespaceExpression(
                        new Identifier('lang'),
                        new Identifier('en')
                    ),
                )
            ],
        ];
    }
}
