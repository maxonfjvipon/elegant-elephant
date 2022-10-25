<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Num;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\AnyOf;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class NumberOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function numOfInt(): void
    {
        $this->assertNumThat(
            NumOf::int(4),
            new IsEqual(4)
        );
    }

    /**
     * @test
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
     * @throws Exception
     */
    public function numOfNumber(): void
    {
        $this->assertNumThat(
            NumOf::number(4.25),
            new IsEqual(4.25)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numOfFunc(): void
    {
        $this->assertNumThat(
            NumOf::func(fn () => 5 + 5),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numOfAny(): void
    {
        $this->assertNumThat(
            NumOf::any(AnyOf::num(10)),
            new IsEqual(10)
        );
    }
}
