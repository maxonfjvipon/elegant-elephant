<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMapped;
use PHPUnit\Framework\TestCase;

class ArrMappedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $arr = [1, 2, 3, 4];
        $expected = [1, 4, 9, 16];
        $callback = fn($item) => $item * $item;
        $this->assertEquals(
            $expected,
            ArrMapped::ofArray($arr, $callback)->asArray()
        );
        $this->assertEquals(
            $expected,
            ArrMapped::ofArrayable(ArrayableOf::array($arr), $callback)->asArray()
        );
        $this->assertNotEquals(
            $expected,
            ArrMapped::ofArray($arr, fn($num) => $num + $num)->asArray()
        );
    }
}