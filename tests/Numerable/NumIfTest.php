<?php

namespace Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\Truth;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\SumOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumIf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class NumIfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function numIfTrue(): void
    {
        Assert::assertThat(
            NumIf::new(true, 10)->asNumber(),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numIfFalseWithNumerable(): void
    {
        Assert::assertThat(
            NumIf::new(false, new NumerableOf(10))->asNumber(),
            new IsEqual(0)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numIfWithLogicalAndCallback(): void
    {
        Assert::assertThat(
            NumIf::new(
                new Truth(),
                fn () => new SumOf(10, 20)
            )->asNumber(),
            new IsEqual(30)
        );
    }
}
