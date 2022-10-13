<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMerged;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\Count;

final class ArrCountTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
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
     * @throws Exception
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
