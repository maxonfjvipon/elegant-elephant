<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrEmpty;
use Maxonfjvipon\ElegantElephant\Arr\ArrObject;
use Maxonfjvipon\ElegantElephant\Arr\ArrCond;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrTernaryTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function arrTernaryWithPrimitives(): void
    {
        $this->assertMixedCastThat(
            new ArrCond(true, [1, 2], [3, 4]),
            new IsEqual([1, 2])
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function arrTernaryWithLogicalAndArrayable(): void
    {
        $this->assertMixedCastThat(
            new ArrCond(new LogicOf(false), new ArrOf([1, 2]), new ArrObject('key', 'value')),
            new IsEqual(['key' => 'value'])
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function arrTernaryWithCallbacks(): void
    {
        $this->assertMixedCastThat(
            new ArrCond(
                new LogicOf(true),
                fn () => new ArrOf([1, 2]),
                fn () => new ArrEmpty()
            ),
            new IsEqual([1, 2])
        );
    }
}
