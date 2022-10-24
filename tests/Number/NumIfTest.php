<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Number;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Num\NumIf;
use Maxonfjvipon\ElegantElephant\Num\SumOf;
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
        $this->assertMixedCastThat(
            new NumIf(true, 10),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numIfFalseWithNumerable(): void
    {
        $this->assertMixedCastThat(
            new NumIf(false, new NumOf(10)),
            new IsEqual(0)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numIfWithLogicalAndCallback(): void
    {
        $this->assertMixedCastThat(
            new NumIf(
                new LogicOf(true),
                fn () => new SumOf(10, 20)
            ),
            new IsEqual(30)
        );
    }
}
