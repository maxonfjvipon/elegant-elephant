<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrRange;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrRangeTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function defaultRangeWithInts(): void
    {
        $this->assertMixedCastThat(
            new ArrRange(1, 4),
            new IsEqual([1, 2, 3, 4])
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function rangeWithFloats(): void
    {
        $this->assertMixedCastThat(
            new ArrRange(1, 3, 0.5),
            new IsEqual([1, 1.5, 2, 2.5, 3])
        );
    }
}
