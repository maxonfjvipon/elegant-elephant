<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\LessThan;
use Maxonfjvipon\ElegantElephant\Num\MaxOf;
use Maxonfjvipon\ElegantElephant\Num\SumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class LessThanTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function lessThanWorks(): void
    {
        $this->assertLogicThat(
            new LessThan(10, 20),
            new IsTrue()
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function notLessButEqual(): void
    {
        $this->assertLogicThat(
            new LessThan(SumOf::items(10, 10), new MaxOf(20, 10)),
            new IsFalse()
        );
    }
}
