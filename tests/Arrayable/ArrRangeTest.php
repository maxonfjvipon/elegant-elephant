<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrRange;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class ArrRangeTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function defaultRangeWithInts(): void
    {
        $this->assertScalarThat(
            ArrRange(1, 4)->value(),
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
            ArrRange(1, 3, 0.5)->value(),
            new IsEqual([1, 1.5, 2, 2.5, 3])
        );
    }
}
