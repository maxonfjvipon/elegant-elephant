<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class SpreadTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function spreadingArrayable(): void
    {
        $this->assertThat(
            [...new ArrayableOf([1, 2, 3])],
            new IsEqual([1, 2, 3])
        );
    }
}
