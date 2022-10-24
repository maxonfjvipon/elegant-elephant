<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arrayable;

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
        $expected = [1, 2, 3, 4];
        $arr = [
            "key1" => 1,
            "key2" => 2,
            "key3" => 3,
            "key4" => 4
        ];
        $this->assertMixedCastThat(
            new ArrValues($arr),
            new IsEqual($expected)
        );
    }
}
