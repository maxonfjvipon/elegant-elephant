<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arrayable;

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
        $this->assertMixedCastThat(
            new ArrSorted(self::GIVEN),
            new IsEqual(self::EXPECTED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sortedOfArrayableWorks(): void
    {
        $this->assertMixedCastThat(
            new ArrSorted(new ArrOf(self::GIVEN)),
            new IsEqual(self::EXPECTED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sortedWithCompareAsCallbackWorks(): void
    {
        $this->assertMixedCastThat(
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
        $this->assertMixedCastThat(
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
