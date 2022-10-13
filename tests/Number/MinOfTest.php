<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Number;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\MinOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\SumOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class MinOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function minOfPrimitives(): void
    {
        $this->assertScalarThat(
            new MinOf(2, 4, 10, -1),
            new IsEqual(-1)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function minOfNumerablesAndPrimitives(): void
    {
        $this->assertScalarThat(
            new MinOf(
                new SumOf(10, 10),
                15,
                new LengthOf([1, 2, 3])
            ),
            new IsEqual(3)
        );
    }
}
