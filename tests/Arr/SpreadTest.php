<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

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
    public function spreadingArr(): void
    {
        $this->assertThat(
            [...ArrOf::array([1, 2, 3])],
            new IsEqual([1, 2, 3])
        );
    }
}
