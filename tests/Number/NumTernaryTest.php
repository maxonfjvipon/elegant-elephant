<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Number;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Num\NumCond;
use Maxonfjvipon\ElegantElephant\Num\SumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class NumTernaryTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function numTernaryWithPrimitives(): void
    {
        $this->assertMixedCastThat(
            new NumCond(true, 10, 12),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numTernaryWithLogicalAndNumerables(): void
    {
        $this->assertMixedCastThat(
            new NumCond(new LogicOf(false), new NumOf(10), new SumOf(5, 2)),
            new IsEqual(7)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numTernaryWithCallbacks(): void
    {
        $this->assertMixedCastThat(
            new NumCond(
                new LogicOf(true),
                fn () => new SumOf(10, 5),
                fn () => 4
            ),
            new IsEqual(15)
        );
    }
}
