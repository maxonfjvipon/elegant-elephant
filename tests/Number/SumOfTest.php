<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Number;

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
    public function sumOfPrimitives(): void
    {
        $this->assertMixedCastThat(
            new SumOf(1, 2, 3, 4),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sumOfNumerablesAndPrimitives(): void
    {
        $this->assertMixedCastThat(
            new SumOf(1, new NumOf(2), new LengthOf([1, 3, 4]), 4),
            new IsEqual(10)
        );
    }
}
