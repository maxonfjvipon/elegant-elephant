<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumberOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\Rounded;
use Maxonfjvipon\Elegant_Elephant\Numerable\SumOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class RoundedTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function roundedOfFloatWithPrecision(): void
    {
        $this->assertScalarThat(
            Rounded(10.4567, 2)->value(),
            new IsEqual(10.46)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function roundedOfNumerableWithoutPrecision(): void
    {
        $this->assertScalarThat(
            Rounded(new SumOf(10, 0.55))->value(),
            new IsEqual(11)
        );
    }
}
