<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrEmpty;
use Maxonfjvipon\ElegantElephant\Arr\ArrObject;
use Maxonfjvipon\ElegantElephant\Arr\ArrCond;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrCondTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function arrTernaryWithPrimitives(): void
    {
        $this->assertArrThat(
            new ArrCond(true, [1, 2], [3, 4]),
            new IsEqual([1, 2])
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function arrTernaryWithLogicalAndArr(): void
    {
        $this->assertArrThat(
            new ArrCond(LogicOf::bool(false), ArrOf::array([1, 2]), new ArrObject('key', 'value')),
            new IsEqual(['key' => 'value'])
        );
    }
}
