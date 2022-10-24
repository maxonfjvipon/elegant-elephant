<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrMerged;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
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
        $this->assertMixedCastThat(
            new ArrOf([1, 2, 3, 4]),
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
        $this->assertMixedCastThat(
            new ArrMerged(
                new ArrOf([1, 2, 3]),
                [4, 5]
            ),
            new Count(5)
        );
    }
}
