<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrSorted;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

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
        Assert::assertThat(
            ArrSorted::new(self::GIVEN)->asArray(),
            new IsEqual(self::EXPECTED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sortedOfArrayableWorks(): void
    {
        Assert::assertThat(
            ArrSorted::new(ArrayableOf::new(self::GIVEN))->asArray(),
            new IsEqual(self::EXPECTED)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sortedWithCompareAsCallbackWorks(): void
    {
        Assert::assertThat(
            ArrSorted::new(self::GIVEN, fn ($a, $b) => $a >= $b ? -1 : 1)->asArray(),
            new IsEqual(array_reverse(self::EXPECTED))
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sortedWithCompareAsStringWorks(): void
    {
        Assert::assertThat(
            ArrSorted::new([
                ['a' => 3],
                ['a' => 1],
                ['a' => 2]
            ], 'a')->asArray(),
            new IsEqual([
                ['a' => 1],
                ['a' => 2],
                ['a' => 3]
            ])
        );
    }
}
