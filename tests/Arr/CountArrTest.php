<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

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
        $this->assertThat(
            new class implements Arr, \Countable {
                use CountArr;

                /**
                 * @return int[]
                 */
                public function asArray(): array
                {
                    return [1, 2, 3];
                }
            },
            new Count(3)
        );
    }
}