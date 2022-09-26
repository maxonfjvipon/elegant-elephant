<?php

namespace Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMerged;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\Count;
use PHPUnit\Framework\TestCase;

final class ArrCountTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function countOfArrayable(): void
    {
        Assert::assertThat(
            new ArrayableOf([1, 2, 3, 4]),
            new Count(4)
        );
    }

    /**
     * @test
     * @return void
     */
    public function countOfArrMerged(): void
    {
        Assert::assertThat(
            new ArrMerged(
                new ArrayableOf([1, 2, 3]),
                [4, 5]
            ),
            new Count(5)
        );
    }
}
