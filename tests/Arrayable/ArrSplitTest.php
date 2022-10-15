<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrSplit;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Constraint\IsEqual;

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
        $this->assertMixedCastThat(
            new ArrSplit(self::SEPARATOR, self::STRING),
            new IsEqual(self::EXPLODED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function splitWithTexts(): void
    {
        $this->assertMixedCastThat(
            new ArrSplit(new TextOf(self::SEPARATOR), new TextOf(self::STRING)),
            new IsEqual(self::EXPLODED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function splitByComma(): void
    {
        $this->assertMixedCastThat(
            ArrSplit::byComma(self::STRING_WITH_COMMA),
            new IsEqual(self::EXPLODED_BY_COMMA)
        );
    }
}
