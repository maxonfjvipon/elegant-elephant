<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrSorted;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrSortedTest extends TestCase
{
    const GIVEN = [2, 4, 1, 3];
    const EXPECTED = [1, 2, 3, 4];

    /**
     * @test
     * @throws Exception
     */
    public function sortedWorks(): void
    {
        $this->assertScalarThat(
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
        $this->assertScalarThat(
            new ArrSorted(new ArrayableOf(self::GIVEN)),
            new IsEqual(self::EXPECTED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sortedWithCompareAsCallbackWorks(): void
    {
        $this->assertScalarThat(
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
        $this->assertScalarThat(
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
