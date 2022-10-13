<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrFlatten;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrFlattenTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function flattenWithArrays(): void
    {
        $this->assertScalarThat(
            new ArrFlatten([1, [2, 3], 4, [5]]),
            new IsEqual([1, 2, 3, 4, 5])
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function flattenWithDeep(): void
    {
        $this->assertScalarThat(
            new ArrFlatten(
                new ArrayableOf(
                    [1, new ArrayableOf([2, 3]), [[4]], [new ArrayableOf([5, 6])]]
                ),
                2
            ),
            new IsEqual([1, 2, 3, 4, 5, 6])
        );
    }
}
