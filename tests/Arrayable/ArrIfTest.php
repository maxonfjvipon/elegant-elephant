<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrIf;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\Count;

final class ArrIfTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrayIfTrue(): void
    {
        $this->assertMixedCastThat(
            new ArrIf(true, [1, 2, 3]),
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
        $this->assertMixedCastThat(
            new ArrIf(false, [1, 2, 3]),
            new Count(0)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrayIfTrueWithCallback(): void
    {
        $this->assertMixedCastThat(
            new ArrIf(true, fn () => new ArrOf([1, 2, 3])),
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
        $this->assertMixedCastThat(
            new ArrIf(new LogicOf(false), fn () => new ArrOf([1, 2, 3])),
            new Count(0)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrayIfWithArrayIf(): void
    {
        $this->assertMixedCastThat(
            new ArrIf(
                true,
                new ArrIf(
                    new LogicOf(true),
                    fn () => [1, 2, 3]
                )
            ),
            new Count(3)
        );
    }
}
