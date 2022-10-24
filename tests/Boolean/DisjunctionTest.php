<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Logic\Disj;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class DisjunctionTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function disjunctionIsTrue(): void
    {
        $this->assertMixedCastThat(
            new Disj(
                new LogicOf(true),
                true,
                new LogicOf(false),
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
        $this->assertMixedCastThat(
            new Disj(
                false,
                new LogicOf(false),
            ),
            new IsFalse()
        );
    }
}
