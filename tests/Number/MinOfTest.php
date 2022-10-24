<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Number;

use Exception;
use Maxonfjvipon\ElegantElephant\Num\LengthOf;
use Maxonfjvipon\ElegantElephant\Num\MinOf;
use Maxonfjvipon\ElegantElephant\Num\SumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class MinOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function minOfPrimitives(): void
    {
        $this->assertMixedCastThat(
            new MinOf(2, 4, 10, -1),
            new IsEqual(-1)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function minOfNumerablesAndPrimitives(): void
    {
        $this->assertMixedCastThat(
            new MinOf(
                new SumOf(10, 10),
                15,
                new LengthOf([1, 2, 3])
            ),
            new IsEqual(3)
        );
    }
}
