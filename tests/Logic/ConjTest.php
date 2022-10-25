<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Logic\Conj;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class ConjTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function conjunctionIsTrue(): void
    {
        $this->assertLogicThat(
            new Conj(LogicOf::bool(true), true),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function conjunctionIsFalse(): void
    {
        $this->assertLogicThat(
            new Conj(LogicOf::bool(false), false),
            new IsFalse()
        );
    }
}
