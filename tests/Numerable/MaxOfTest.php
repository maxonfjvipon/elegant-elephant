<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\MaxOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\SumOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class MaxOfTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function maxOfPrimitives(): void
    {
        $this->assertScalarThat(
            MaxOf(2, 4, 10, -1)->value(),
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
            MaxOf(
                new SumOf(10, 10),
                15,
                new LengthOf([1, 2, 3])
            )->value(),
            new IsEqual(20)
        );
    }
}
