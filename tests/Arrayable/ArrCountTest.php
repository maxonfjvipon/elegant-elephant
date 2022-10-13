<?php

namespace Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMerged;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\Count;


final class ArrCountTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @return void
     */
    public function countOfArrayable(): void
    {
        $this->assertScalarThat(
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
        $this->assertScalarThat(
            new ArrMerged(
                new ArrayableOf([1, 2, 3]),
                [4, 5]
            ),
            new Count(5)
        );
    }
}
