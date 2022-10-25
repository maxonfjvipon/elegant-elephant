<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Any\FirstOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrCast;
use Maxonfjvipon\ElegantElephant\Arr\ArrObject;
use Maxonfjvipon\ElegantElephant\Logic\Not;
use Maxonfjvipon\ElegantElephant\Num\SumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrCastTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function arrCastWorks(): void
    {
        $this->assertArrThat(
            new ArrCast([
                42, // int
                12.5, // float
                'hello there', // string
                ['foo', 'bar'], // array
                true, // boolean
                new SumOf([2, 3]), // Num
                new TxtUpper("foo"), // Txt
                new ArrObject('key', 'value'), // Arr
                LogicOf::bool(true), // Logic
                new FirstOf([1, 2, 3]), // Any
            ]),
            new IsEqual([
                42,
                12.5,
                'hello there',
                ['foo', 'bar'],
                true,
                5,
                'FOO',
                ['key' => 'value'],
                true,
                1
            ])
        );
    }
}
