<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Logic\Disj;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class DisjTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function disjunctionIsTrue(): void
    {
        $this->assertLogicThat(
            new Disj(
                LogicOf::bool(true),
                true,
                LogicOf::bool(false),
                false
            ),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function disjunctionIsFalse(): void
    {
        $this->assertLogicThat(
            new Disj(
                false,
                LogicOf::bool(false),
            ),
            new IsFalse()
        );
    }
}
