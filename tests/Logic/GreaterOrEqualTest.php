<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\GreaterOrEqual;
use Maxonfjvipon\ElegantElephant\Logic\LessOrEqual;
use Maxonfjvipon\ElegantElephant\Num\MaxOf;
use Maxonfjvipon\ElegantElephant\Num\SumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsTrue;

final class GreaterOrEqualTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function greaterThanWorks(): void
    {
        $this->assertLogicThat(
            new GreaterOrEqual(20, 10),
            new IsTrue()
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function notGreaterButEqual(): void
    {
        $this->assertLogicThat(
            new GreaterOrEqual(SumOf::items(10, 10), new MaxOf(20, 10)),
            new IsTrue()
        );
    }
}
