<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Number;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Number\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Number\NumberOf;
use Maxonfjvipon\Elegant_Elephant\Number\SumOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
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
            new SumOf(1, new NumberOf(2), new LengthOf([1, 3, 4]), 4),
            new IsEqual(10)
        );
    }
}
