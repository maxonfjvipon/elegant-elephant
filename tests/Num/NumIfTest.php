<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Num;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Num\NumIf;
use Maxonfjvipon\ElegantElephant\Num\SumOf;
use Maxonfjvipon\ElegantElephant\Tests\IsNum;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class NumIfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function numIfTrue(): void
    {
        $this->assertNumThat(
            new NumIf(true, 10),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numIfFalseWithNum(): void
    {
        $this->assertNumThat(
            new NumIf(false, $num = NumOf::int(10)),
            new IsEqual(0)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numIfWithLogicAndNumOfFunc(): void
    {
        $this->assertNumThat(
            new NumIf(
                LogicOf::bool(true),
                NumOf::func(fn () => 2 + 2)
            ),
            new IsEqual(4)
        );
    }
}
