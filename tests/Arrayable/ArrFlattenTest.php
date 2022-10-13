<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrFlatten;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class ArrFlattenTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function flattenWithArrays(): void
    {
        $this->assertScalarThat(
            ArrFlatten([1, [2, 3], 4, [5]])->value(),
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
            ArrFlatten(
                new ArrayableOf(
                    [1, new ArrayableOf([2, 3]), [[4]], [new ArrayableOf([5, 6])]]
                ),
                2
            )->value(),
            new IsEqual([1, 2, 3, 4, 5, 6])
        );
    }
}
