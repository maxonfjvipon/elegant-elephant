<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrExploded;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class ArrExplodedTest extends TestCase
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
    public function explodedWithStrings(): void
    {
        Assert::assertThat(
            ArrExploded::new(self::SEPARATOR, self::STRING)->asArray(),
            new IsEqual(self::EXPLODED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function explodedWithTexts(): void
    {
        Assert::assertThat(
            ArrExploded::new(new TextOf(self::SEPARATOR), new TextOf(self::STRING))->asArray(),
            new IsEqual(self::EXPLODED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function explodedByComma(): void
    {
        Assert::assertThat(
            ArrExploded::byComma(self::STRING_WITH_COMMA)->asArray(),
            new IsEqual(self::EXPLODED_BY_COMMA)
        );
    }
}
