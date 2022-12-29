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
                'key1' => TxtOf::str('value1'),
                'key2' => 'value2',
                10 => NumOf::number(20),
                'foo' => new LastOf(['bar', 'baz'])
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
                'A' => ArrOf::array([1, 2, 3]),
                'B' => ArrOf::array([3, 2, 1]),
                'C' => [4, 5, 6],
            ])
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function combinedWithInsurance(): void
    {
        $this->assertArrThat(
            new ArrCombined(
                [1, 2, 3],
                [
                    TxtOf::str("Hello"),
                    NumOf::int(2),
                    ArrOf::array([1, 2])
                ],
                ensure: true
            ),
            new IsEqual([
                1 => 'Hello',
                2 => 2,
                3 => [1, 2]
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
