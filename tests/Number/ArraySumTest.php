<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Number;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Num\ArraySum;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArraySumTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function arraySumOfArray(): void
    {
        $this->assertMixedCastThat(
            new ArraySum([1, 2, 3, 4]),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function arraySumOfArrayable(): void
    {
        $this->assertMixedCastThat(
            new ArraySum(ArrOf::items(2, 3, 4)),
            new IsEqual(9)
        );
    }
}
