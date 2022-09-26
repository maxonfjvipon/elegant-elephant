<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrFlatten;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class ArrFlattenTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function flattenWithArrays(): void
    {
        Assert::assertThat(
            ArrFlatten::new([1, [2, 3], 4, [5]])->asArray(),
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
        Assert::assertThat(
            ArrFlatten::new(
                new ArrayableOf(
                    [1, new ArrayableOf([2, 3]), [[4]], [new ArrayableOf([5, 6])]]
                ),
                2
            )->asArray(),
            new IsEqual([1, 2, 3, 4, 5, 6])
        );
    }
}
