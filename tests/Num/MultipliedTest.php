<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Num;

use Exception;
use Maxonfjvipon\ElegantElephant\Num\Multiplied;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class MultipliedTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function multiplicationWorks(): void
    {
        $this->assertNumThat(
            new Multiplied(
                NumOf::int(10),
                22.2
            ),
            new IsEqual(222)
        );
    }
}
