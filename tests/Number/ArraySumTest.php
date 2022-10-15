<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Number;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Number\ArraySum;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArraySumTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function arraySumOfArray(): void
    {
        $this->assertMixedCastThat(
            new ArraySum([1, 2, 3, 4]),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function arraySumOfArrayable(): void
    {
        $this->assertMixedCastThat(
            new ArraySum(ArrayableOf::items(2, 3, 4)),
            new IsEqual(9)
        );
    }
}
