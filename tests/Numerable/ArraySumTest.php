<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\ArraySum;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


use function PHPUnit\Framework\assertEquals;

final class ArraySumTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function arraySumOfArray(): void
    {
        $this->assertScalarThat(
            ArraySum([1, 2, 3, 4])->value(),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function arraySumOfArrayable(): void
    {
        $this->assertScalarThat(
            ArraySum(ArrayableOf::items(2, 3, 4))->value(),
            new IsEqual(9)
        );
    }
}
