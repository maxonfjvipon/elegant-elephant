<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrIf;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\Count;

use function Maxonfjvipon\ElegantElephant\Arr\array_if;

final class ArrIfTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrayIfTrue(): void
    {
        $this->assertArrThat(
            new ArrIf(true, [1, 2, 3]),
            new Count(3)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrayIfFunctionTrue(): void
    {
        $this->assertThat(
            array_if(true, [1, 2, 3]),
            new Count(3)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrayIfFalse(): void
    {
        $this->assertArrThat(
            new ArrIf(false, [1, 2, 3]),
            new Count(0)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrayIfTrueArrOfFunc(): void
    {
        $this->assertArrThat(
            new ArrIf(true, ArrOf::func(fn () => [1, 2, 3])),
            new Count(3)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrayIfWithLogical(): void
    {
        $this->assertArrThat(
            new ArrIf(LogicOf::bool(false), ArrOf::func(fn () => [1, 2, 3])),
            new Count(0)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrIfWithArrIf(): void
    {
        $this->assertArrThat(
            new ArrIf(
                true,
                new ArrIf(
                    LogicOf::bool(true),
                    ArrOf::func(fn () => [1, 2, 3]),
                )
            ),
            new Count(3)
        );
    }
}
