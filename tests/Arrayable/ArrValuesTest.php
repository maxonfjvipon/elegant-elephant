<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrValues;
use PHPUnit\Framework\TestCase;

class ArrValuesTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $expected = [1, 2, 3, 4];
        $arr = [
            "key1" => 1,
            "key2" => 2,
            "key3" => 3,
            "key4" => 4
        ];

        $this->assertEquals(
            $expected,
            ArrValues::ofArray($arr)->asArray()
        );
        $this->assertEquals(
            $expected,
            ArrValues::ofArrayble(ArrayableOf::array($arr))->asArray()
        );
        $this->assertEquals(
            $expected,
            ArrValues::ofArray($expected)->asArray()
        );
        $this->assertNotEquals(
            $expected,
            ArrValues::ofArray([
                0 => 2,
                1 => 3,
                2 => 4,
                3 => 5
            ])->asArray()
        );
    }
}
