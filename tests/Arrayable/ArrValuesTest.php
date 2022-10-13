<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrValues;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
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
        $this->assertScalarThat(
            new ArrValues($arr),
            new IsEqual($expected)
        );
    }
}
