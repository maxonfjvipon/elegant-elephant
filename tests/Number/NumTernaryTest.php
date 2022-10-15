<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Number;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\BooleanOf;
use Maxonfjvipon\Elegant_Elephant\Number\NumberOf;
use Maxonfjvipon\Elegant_Elephant\Number\NumTernary;
use Maxonfjvipon\Elegant_Elephant\Number\SumOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class NumTernaryTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function numTernaryWithPrimitives(): void
    {
        $this->assertMixedCastThat(
            new NumTernary(true, 10, 12),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numTernaryWithLogicalAndNumerables(): void
    {
        $this->assertMixedCastThat(
            new NumTernary(new BooleanOf(false), new NumberOf(10), new SumOf(5, 2)),
            new IsEqual(7)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numTernaryWithCallbacks(): void
    {
        $this->assertMixedCastThat(
            new NumTernary(
                new BooleanOf(true),
                fn () => new SumOf(10, 5),
                fn () => 4
            ),
            new IsEqual(15)
        );
    }
}
