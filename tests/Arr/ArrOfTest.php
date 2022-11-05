<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\AnyOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\Count;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrOfTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrOfItems(): void
    {
        $this->assertArrThat(
            ArrOf::items(1, 2, 3, 4),
            new Count(4)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrOfArray(): void
    {
        $this->assertArrThat(
            ArrOf::array($arr = [1, 2, 3, 4]),
            new IsEqual($arr)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrOfAny(): void
    {
        $this->assertArrThat(
            ArrOf::any(AnyOf::arr($arr = [1, 2, 3])),
            new IsEqual($arr)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrOfFunc(): void
    {
        $this->assertArrThat(
            ArrOf::func(fn () => [1, 2, 3]),
            new Count(3)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrOfFuncThatReturnArr(): void
    {
        $this->assertArrThat(
            ArrOf::func(fn () => ArrOf::array([1, 2, 3])),
            new Count(3)
        );
    }
}
