<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrValues;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrValuesTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function arrValuesWorks(): void
    {
        $this->assertArrThat(
            new ArrValues([
                "key1" => 1,
                "key2" => 2,
                "key3" => 3,
                "key4" => 4
            ]),
            new IsEqual([1, 2, 3, 4])
        );
    }
}
