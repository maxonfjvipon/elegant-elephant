<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrUnique;
use Maxonfjvipon\ElegantElephant\Arr\ArrValues;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrUniqueTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function uniqueWorks(): void
    {
        $this->assertArrThat(
            new ArrValues(new ArrUnique([1, 1, 2, 3, 4, 5, 5])),
            new IsEqual([1, 2, 3, 4, 5])
        );
    }
}
