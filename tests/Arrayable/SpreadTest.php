<?php

namespace Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class SpreadTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function spreadingArrayable(): void
    {
        Assert::assertThat(
            [...new ArrayableOf([1, 2, 3])],
            new IsEqual([1, 2, 3])
        );
    }
}
