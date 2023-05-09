<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrSplit;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Constraint\IsEqual;

use function Maxonfjvipon\ElegantElephant\Arr\array_split;

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
        $this->assertArrThat(
            new ArrSplit(self::SEPARATOR, self::STRING),
            new IsEqual(self::EXPLODED)
        );
    }

        /**
     * @test
     * @throws Exception
     */
    public function splitFunctionWithStrings(): void
    {
        $this->assertThat(
            array_split(self::SEPARATOR, self::STRING),
            new IsEqual(self::EXPLODED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function splitWithTexts(): void
    {
        $this->assertArrThat(
            new ArrSplit(TxtOf::str(self::SEPARATOR), TxtOf::str(self::STRING)),
            new IsEqual(self::EXPLODED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function splitByComma(): void
    {
        $this->assertArrThat(
            ArrSplit::byComma(self::STRING_WITH_COMMA),
            new IsEqual(self::EXPLODED_BY_COMMA)
        );
    }
}
