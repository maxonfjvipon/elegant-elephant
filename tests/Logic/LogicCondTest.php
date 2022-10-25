<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\AnyOf;
use Maxonfjvipon\ElegantElephant\Logic\LogicCond;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Num\NumCond;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Num\SumOf;
use Maxonfjvipon\ElegantElephant\Tests\IsLogic;
use Maxonfjvipon\ElegantElephant\Tests\IsNum;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Constraint\IsTrue;

final class LogicCondTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function logicCondWithPrimitives(): void
    {
        $this->assertLogicThat(
            new LogicCond(true, true, false),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numCondWithLogicAndNums(): void
    {
        $this->assertLogicThat(
            new LogicCond(LogicOf::bool(false), LogicOf::func(fn () => true), $logic = LogicOf::any(AnyOf::bool(false))),
            new IsLogic($logic)
        );
    }
}