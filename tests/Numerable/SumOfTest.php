<?php

namespace Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\SumOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class SumOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function sumOfPrimitives(): void
    {
        Assert::assertThat(
            SumOf::new(1, 2, 3, 4)->asNumber(),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sumOfNumerablesAndPrimitives(): void
    {
        Assert::assertThat(
            SumOf::new(1, new NumerableOf(2), new LengthOf([1, 3, 4]), 4)->asNumber(),
            new IsEqual(10)
        );
    }
}
