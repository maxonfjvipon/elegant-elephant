<?php

namespace Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\Truth;
use Maxonfjvipon\Elegant_Elephant\Logical\Untruth;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumTernary;
use Maxonfjvipon\Elegant_Elephant\Numerable\SumOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class NumTernaryTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function numTernaryWithPrimitives(): void
    {
        Assert::assertThat(
            NumTernary::new(true, 10, 12)->asNumber(),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numTernaryWithLogicalAndNumerables(): void
    {
        Assert::assertThat(
            NumTernary::new(new Untruth(), new NumerableOf(10), new SumOf(5, 2))->asNumber(),
            new IsEqual(7)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numTernaryWithCallbacks(): void
    {
        Assert::assertThat(
            NumTernary::new(
                new Truth(),
                fn () => new SumOf(10, 5),
                fn () => 4
            )->asNumber(),
            new IsEqual(15)
        );
    }
}
