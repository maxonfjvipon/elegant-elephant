<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Number;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Number\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Number\MaxOf;
use Maxonfjvipon\Elegant_Elephant\Number\SumOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class MaxOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function maxOfPrimitives(): void
    {
        $this->assertScalarThat(
            new MaxOf(2, 4, 10, -1),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function maxOfNumerablesAndPrimitives(): void
    {
        $this->assertScalarThat(
            new MaxOf(
                new SumOf(10, 10),
                15,
                new LengthOf([1, 2, 3])
            ),
            new IsEqual(20)
        );
    }
}
