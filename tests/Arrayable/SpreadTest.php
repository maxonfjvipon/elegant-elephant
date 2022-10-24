<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
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
            [...new ArrOf([1, 2, 3])],
            new IsEqual([1, 2, 3])
        );
    }
}
