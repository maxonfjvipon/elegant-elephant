<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

use Countable;
use Exception;
use Maxonfjvipon\ElegantElephant\Arr;
use Maxonfjvipon\ElegantElephant\Arr\CountArr;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\Count;

final class CountArrTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function countOfArrWorks(): void
    {
        $class = new class () implements Countable, Arr {
            use CountArr;

            /**
             * @return int[]
             */
            public function asArray(): array
            {
                return [1, 2, 3];
            }
        };
        $this->assertThat(
            $class,
            new Count(3)
        );
    }
}
