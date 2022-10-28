<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Num;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Num\NumCond;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Num\SumOf;
use Maxonfjvipon\ElegantElephant\Tests\Support\IsNum;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class NumCondTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function numCondWithPrimitives(): void
    {
        $this->assertNumThat(
            new NumCond(true, 10, 12),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numCondWithLogicAndNums(): void
    {
        $this->assertNumThat(
            new NumCond(LogicOf::bool(false), NumOf::int(10), $sum  = new SumOf([5, 2])),
            new IsNum($sum)
        );
    }
}
