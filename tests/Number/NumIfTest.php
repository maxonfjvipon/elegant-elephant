<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Number;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\BooleanOf;
use Maxonfjvipon\Elegant_Elephant\Number\NumberOf;
use Maxonfjvipon\Elegant_Elephant\Number\NumIf;
use Maxonfjvipon\Elegant_Elephant\Number\SumOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class NumIfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function numIfTrue(): void
    {
        $this->assertScalarThat(
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
        $this->assertScalarThat(
            new NumIf(false, new NumberOf(10)),
            new IsEqual(0)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numIfWithLogicalAndCallback(): void
    {
        $this->assertScalarThat(
            new NumIf(
                new BooleanOf(true),
                fn () => new SumOf(10, 20)
            ),
            new IsEqual(30)
        );
    }
}
