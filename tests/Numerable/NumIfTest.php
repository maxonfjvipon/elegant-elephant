<?php

namespace Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\True;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumberOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\SumOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumIf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class NumIfTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function numIfTrue(): void
    {
        $this->assertScalarThat(
            NumIf(true, 10)->value(),
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
            NumIf(false, new NumberOf(10))->value(),
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
            NumIf(
                new True(),
                fn () => new SumOf(10, 20)
            )->value(),
            new IsEqual(30)
        );
    }
}
