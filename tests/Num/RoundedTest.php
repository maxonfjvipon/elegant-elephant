<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Num;

use Exception;
use Maxonfjvipon\ElegantElephant\Num\Rounded;
use Maxonfjvipon\ElegantElephant\Num\SumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class RoundedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function roundedOfFloatWithPrecision(): void
    {
        $this->assertNumThat(
            new Rounded(10.4567, 2),
            new IsEqual(10.46)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function roundedOfNumWithoutPrecision(): void
    {
        $this->assertNumThat(
            new Rounded(new SumOf([10, 0.55])),
            new IsEqual(11)
        );
    }
}
