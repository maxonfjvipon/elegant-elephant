<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\FirstOf;
use Maxonfjvipon\ElegantElephant\Any\LastOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrCombined;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrCombinedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function combinedWorks(): void
    {
        $this->assertArrThat(
            new ArrCombined([
                TxtOf::str("key1"),
                'key2',
                NumOf::number(10),
                new FirstOf(['foo', 'bar'])
            ], [
                TxtOf::str('value1'),
                'value2',
                NumOf::number(20),
                new LastOf(['bar', 'baz'])
            ]),
            new IsEqual([
                'key1' => 'value1',
                'key2' => 'value2',
                10 => 20,
                'foo' => 'baz'
            ])
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function combinedWithArraysAsValues(): void
    {
        $this->assertArrThat(
            new ArrCombined(
                ['A', 'B', 'C'],
                [
                    ArrOf::array([1, 2, 3]),
                    ArrOf::array([3, 2, 1]),
                    [4, 5, 6]
                ]
            ),
            new IsEqual([
                'A' => [1, 2, 3],
                'B' => [3, 2, 1],
                'C' => [4, 5, 6],
            ])
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function combinedWithDifferentCounts(): void
    {
        $this->expectExceptionMessage("Keys and values arrays must have the same length");
        (new ArrCombined([1, 2], [1, 2, 3]))->asArray();
    }
}
