<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrSorted;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrSortedTest extends TestCase
{
    public const GIVEN = [2, 4, 1, 3];
    public const EXPECTED = [1, 2, 3, 4];

    /**
     * @test
     * @throws Exception
     */
    public function sortedWorks(): void
    {
        $this->assertArrThat(
            new ArrSorted(self::GIVEN),
            new IsEqual(self::EXPECTED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sortedOfArrWorks(): void
    {
        $this->assertArrThat(
            new ArrSorted(ArrOf::array(self::GIVEN)),
            new IsEqual(self::EXPECTED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sortedWithCompareAsCallbackWorks(): void
    {
        $this->assertArrThat(
            new ArrSorted(self::GIVEN, fn ($a, $b) => $a >= $b ? -1 : 1),
            new IsEqual(array_reverse(self::EXPECTED))
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sortedWithCompareAsStringWorks(): void
    {
        $this->assertArrThat(
            new ArrSorted([
                ['a' => 3],
                ['a' => 1],
                ['a' => 2]
            ], 'a'),
            new IsEqual([
                ['a' => 1],
                ['a' => 2],
                ['a' => 3]
            ])
        );
    }
}
