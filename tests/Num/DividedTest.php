<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Num;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\AnyOf;
use Maxonfjvipon\ElegantElephant\Num\Divided;
use Maxonfjvipon\ElegantElephant\Num\Multiplied;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class DividedTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function divisionWorks(): void
    {
        $this->assertNumThat(
            new Divided(
                new Multiplied(
                    20,
                    NumOf::any(
                        AnyOf::num(30)
                    )
                ),
                15
            ),
            new IsEqual(20 * 30 / 15)
        );
    }
}
