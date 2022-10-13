<?php

namespace Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\MinOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\SumOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class MinOfTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function minOfPrimitives(): void
    {
        $this->assertScalarThat(
            MinOf(2, 4, 10, -1)->value(),
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
            MinOf(
                new SumOf(10, 10),
                15,
                new LengthOf([1, 2, 3])
            )->value(),
            new IsEqual(3)
        );
    }
}
