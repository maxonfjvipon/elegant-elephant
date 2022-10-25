<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Logic\Not;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class NotTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function notTrue(): void
    {
        $this->assertLogicThat(
            new Not(true),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function notFalse(): void
    {
        $this->assertLogicThat(
            new Not(false),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function notTrueObj(): void
    {
        $this->assertLogicThat(
            new Not(LogicOf::bool(true)),
            new IsFalse()
        );
    }
}
