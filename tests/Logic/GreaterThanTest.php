<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\GreaterThan;
use Maxonfjvipon\ElegantElephant\Num\MaxOf;
use Maxonfjvipon\ElegantElephant\Num\SumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class GreaterThanTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function greaterThanWorks(): void
    {
        $this->assertLogicThat(
            new GreaterThan(20, 10),
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
            new GreaterThan(SumOf::items(10, 10), new MaxOf(20, 10)),
            new IsFalse()
        );
    }
}
