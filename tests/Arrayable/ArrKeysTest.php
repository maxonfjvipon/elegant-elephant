<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrKeys;
use PHPUnit\Framework\TestCase;

class ArrKeysTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $expected = [1, 2, 3, 4];
        $arr = [
            1 => "value1",
            2 => "value2",
            3 => "value3",
            4 => "value4"
        ];

        $this->assertEquals(
            $expected,
            ArrKeys::ofArray($arr)->asArray()
        );
        $this->assertEquals(
            $expected,
            ArrKeys::ofArrayble(ArrayableOf::array($arr))->asArray()
        );
        $this->assertNotEquals(
            $expected,
            ArrKeys::ofArray([
                0 => 1,
                1 => 2,
                2 => 3,
                3 => 4
            ])->asArray()
        );
    }
}