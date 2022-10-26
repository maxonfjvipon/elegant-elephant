<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Num;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\AnyOf;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class NumOfTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function numOfInt(): void
    {
        $this->assertNumThat(
            NumOf::int(5),
            new IsEqual(5)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function numOfFloat(): void
    {
        $this->assertNumThat(
            NumOf::float(4.2),
            new IsEqual(4.2)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function numOfNumber(): void
    {
        $this->assertNumThat(
            NumOf::number(10.2),
            new IsEqual(10.2)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function numOfAny(): void
    {
        $this->assertNumThat(
            NumOf::any(AnyOf::num(5)),
            new IsEqual(5)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function numOfFunc(): void
    {
        $this->assertNumThat(
            NumOf::func(fn () => 5),
            new IsEqual(5)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function numOfFuncThatReturnsFunc(): void
    {
        $this->assertNumThat(
            NumOf::func(fn () => NumOf::int(5)),
            new IsEqual(5)
        );
    }
}