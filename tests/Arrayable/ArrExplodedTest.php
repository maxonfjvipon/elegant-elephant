<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrExploded;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Constraint\IsEqual;

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
        $this->assertMixedCastThat(
            new ArrExploded(self::SEPARATOR, self::STRING),
            new IsEqual(self::EXPLODED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function explodedWithTexts(): void
    {
        $this->assertMixedCastThat(
            new ArrExploded(new TxtOf(self::SEPARATOR), new TxtOf(self::STRING)),
            new IsEqual(self::EXPLODED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function explodedByComma(): void
    {
        $this->assertMixedCastThat(
            ArrExploded::byComma(self::STRING_WITH_COMMA),
            new IsEqual(self::EXPLODED_BY_COMMA)
        );
    }
}
