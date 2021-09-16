<?php

namespace Tests\Unit;

use Mention\BooleanRequest;
use Mention\Grammar\Tokens\Keyword;
use Mention\Syntax\Expressions\AndExpression;
use Mention\Syntax\Expressions\ExpressionInterface;
use Mention\Syntax\Expressions\KeywordExpression;
use Mention\Syntax\Expressions\OrExpression;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Mention\BooleanRequest
 */
class BooleanRequestTest extends TestCase
{
    /**
     * @covers ::or
     * @dataProvider orDataProvider
     */
    public function testOr(string $expected, ExpressionInterface $expression, Keyword $keyword): void
    {
        $request = new BooleanRequest($expression);
        $request->or($keyword);

        $this->assertEquals(
            $expected,
            (string) $request
        );
    }

    /**
     * @return array<mixed>
     */
    public function orDataProvider(): array
    {
        return [
            'keyword plus keyword' => [
                'expected' => "javascript OR php",
                'expression' => new KeywordExpression(Keyword::javascript()),
                'keyword' => Keyword::php(),
            ],

            'or expression plus keyword' => [
                'expected' => "javascript OR python OR php",
                'expression' => new OrExpression(
                    new KeywordExpression(Keyword::javascript()),
                    new KeywordExpression(Keyword::python()),
                ),
                'keyword' => Keyword::php(),
            ],

            'and expression plus keyword' => [
                'expected' => "(javascript AND python) OR php",
                'expression' => new AndExpression(
                    new KeywordExpression(Keyword::javascript()),
                    new KeywordExpression(Keyword::python()),
                ),
                'keyword' => Keyword::php(),
            ],
        ];
    }
}
