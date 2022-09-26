<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrExploded;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrSplit;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class ArrSplitTest extends TestCase
{
    public const SEPARATOR = "-";
    public const STRING = "foo-bar";
    public const STRING_WITH_COMMA = "foo,bar,baz";
    public const EXPLODED = ["foo", "bar"];
    public const EXPLODED_BY_COMMA = ["foo", 'bar', 'baz'];

    /**
     * @test
     * @throws Exception
     */
    public function splitWithStrings(): void
    {
        Assert::assertThat(
            ArrSplit::new(self::SEPARATOR, self::STRING)->asArray(),
            new IsEqual(self::EXPLODED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function splitWithTexts(): void
    {
        Assert::assertThat(
            ArrSplit::new(new TextOf(self::SEPARATOR), new TextOf(self::STRING))->asArray(),
            new IsEqual(self::EXPLODED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function splitByComma(): void
    {
        Assert::assertThat(
            ArrSplit::byComma(self::STRING_WITH_COMMA)->asArray(),
            new IsEqual(self::EXPLODED_BY_COMMA)
        );
    }
}
