<?php

namespace Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class SpreadTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @return void
     */
    public function spreadingArrayable(): void
    {
        $this->assertScalarThat(
            [...new ArrayableOf([1, 2, 3])],
            new IsEqual([1, 2, 3])
        );
    }
}
