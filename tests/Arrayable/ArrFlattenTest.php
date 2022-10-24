<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrFlatten;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrFlattenTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function flattenWithArrays(): void
    {
        $this->assertMixedCastThat(
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
        $this->assertMixedCastThat(
            new ArrFlatten(
                new ArrOf(
                    [1, new ArrOf([2, 3]), [[4]], [new ArrOf([5, 6])]]
                ),
                2
            ),
            new IsEqual([1, 2, 3, 4, 5, 6])
        );
    }
}
