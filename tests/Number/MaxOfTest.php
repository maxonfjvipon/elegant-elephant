<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Number;

use Exception;
use Maxonfjvipon\ElegantElephant\Num\LengthOf;
use Maxonfjvipon\ElegantElephant\Num\MaxOf;
use Maxonfjvipon\ElegantElephant\Num\SumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class MaxOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function maxOfPrimitives(): void
    {
        $this->assertMixedCastThat(
            new MaxOf(2, 4, 10, -1),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function maxOfNumerablesAndPrimitives(): void
    {
        $this->assertMixedCastThat(
            new MaxOf(
                new SumOf(10, 10),
                15,
                new LengthOf([1, 2, 3])
            ),
            new IsEqual(20)
        );
    }
}
