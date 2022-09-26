<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrRange;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class ArrRangeTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function defaultRangeWithInts(): void
    {
        Assert::assertThat(
            ArrRange::new(1, 4)->asArray(),
            new IsEqual([1, 2, 3, 4])
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function rangeWithFloats(): void
    {
        Assert::assertThat(
            ArrRange::new(1, 3, 0.5)->asArray(),
            new IsEqual([1, 1.5, 2, 2.5, 3])
        );
    }
}
