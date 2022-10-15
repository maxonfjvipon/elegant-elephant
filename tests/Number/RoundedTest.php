<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Number;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Number\Rounded;
use Maxonfjvipon\Elegant_Elephant\Number\SumOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class RoundedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function roundedOfFloatWithPrecision(): void
    {
        $this->assertMixedCastThat(
            new Rounded(10.4567, 2),
            new IsEqual(10.46)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function roundedOfNumerableWithoutPrecision(): void
    {
        $this->assertMixedCastThat(
            new Rounded(new SumOf(10, 0.55)),
            new IsEqual(11)
        );
    }
}
