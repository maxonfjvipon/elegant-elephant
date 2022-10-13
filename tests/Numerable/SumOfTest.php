<?php

namespace Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumberOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\SumOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class SumOfTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function sumOfPrimitives(): void
    {
        $this->assertScalarThat(
            SumOf(1, 2, 3, 4)->value(),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sumOfNumerablesAndPrimitives(): void
    {
        $this->assertScalarThat(
            SumOf(1, new NumberOf(2), new LengthOf([1, 3, 4]), 4)->value(),
            new IsEqual(10)
        );
    }
}
