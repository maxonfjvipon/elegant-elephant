<?php

namespace Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\MinOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\SumOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class MinOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function minOfPrimitives(): void
    {
        Assert::assertThat(
            MinOf::new(2, 4, 10, -1)->asNumber(),
            new IsEqual(-1)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function minOfNumerablesAndPrimitives(): void
    {
        Assert::assertThat(
            MinOf::new(
                new SumOf(10, 10),
                15,
                new LengthOf([1, 2, 3])
            )->asNumber(),
            new IsEqual(3)
        );
    }
}
