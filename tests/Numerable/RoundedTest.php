<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\Rounded;
use Maxonfjvipon\Elegant_Elephant\Numerable\SumOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class RoundedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function roundedOfFloatWithPrecision(): void
    {
        Assert::assertThat(
            Rounded::new(10.4567, 2)->asNumber(),
            new IsEqual(10.46)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function roundedOfNumerableWithoutPrecision(): void
    {
        Assert::assertThat(
            Rounded::new(new SumOf(10, 0.55))->asNumber(),
            new IsEqual(11)
        );
    }
}
