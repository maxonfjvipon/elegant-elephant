<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Num;

use Exception;
use Maxonfjvipon\ElegantElephant\Num\LengthOf;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Num\SumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class SumOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function sumOfArrayOfNumbers(): void
    {
        $this->assertNumThat(
            new SumOf([1, 2, 3.2, 4]),
            new IsEqual(10.2)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sumOfArrayOfNumbersAndNums(): void
    {
        $this->assertNumThat(
            new SumOf([NumOf::func(fn () => 1), 2, NumOf::float(3.2), 4]),
            new IsEqual(10.2)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sumOfItems(): void
    {
        $this->assertNumThat(
            SumOf::items(1, 2, NumOf::float(3.3), 4),
            new IsEqual(10.3)
        );
    }
}
