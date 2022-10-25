<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Num;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Num\ArraySum;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
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
        $this->assertNumThat(
            new ArraySum([1, 2, 3, 4]),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function arraySumOfArr(): void
    {
        $this->assertNumThat(
            new ArraySum(ArrOf::items(2, NumOf::number(3), 4)),
            new IsEqual(9)
        );
    }
}
