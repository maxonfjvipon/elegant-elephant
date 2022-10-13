<?php

namespace Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\True;
use Maxonfjvipon\Elegant_Elephant\Boolean\Untruth;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumberOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumTernary;
use Maxonfjvipon\Elegant_Elephant\Numerable\SumOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class NumTernaryTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function numTernaryWithPrimitives(): void
    {
        $this->assertScalarThat(
            NumTernary(true, 10, 12)->value(),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numTernaryWithLogicalAndNumerables(): void
    {
        $this->assertScalarThat(
            NumTernary(new Untruth(), new NumberOf(10), new SumOf(5, 2))->value(),
            new IsEqual(7)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numTernaryWithCallbacks(): void
    {
        $this->assertScalarThat(
            NumTernary(
                new True(),
                fn () => new SumOf(10, 5),
                fn () => 4
            )->value(),
            new IsEqual(15)
        );
    }
}
