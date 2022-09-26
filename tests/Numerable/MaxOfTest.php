<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\MaxOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\SumOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class MaxOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function maxOfPrimitives(): void
    {
        Assert::assertThat(
            MaxOf::new(2, 4, 10, -1)->asNumber(),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function maxOfNumerablesAndPrimitives(): void
    {
        Assert::assertThat(
            MaxOf::new(
                new SumOf(10, 10),
                15,
                new LengthOf([1, 2, 3])
            )->asNumber(),
            new IsEqual(20)
        );
    }
}
