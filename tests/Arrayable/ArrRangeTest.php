<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrRange;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrRangeTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function defaultRangeWithInts(): void
    {
        $this->assertScalarThat(
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
        $this->assertScalarThat(
            new ArrRange(1, 3, 0.5),
            new IsEqual([1, 1.5, 2, 2.5, 3])
        );
    }
}
