<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrFiltered;
use PHPUnit\Framework\TestCase;

class ArrFilteredTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $expected = [3 => 6, 4 => 7, 5 => 8];
        $arr = [1, 2, 5, 6, 7, 8];
        $callback = fn($num) => $num > 5;

        $this->assertEquals(
            $expected,
            ArrFiltered::ofArray($arr, $callback)->asArray()
        );
        $this->assertEquals(
            $expected,
            ArrFiltered::ofArrayable(ArrayableOf::array($arr), $callback)->asArray()
        );
        $this->assertNotEquals(
            $expected,
            ArrFiltered::ofArray($arr, fn($num) => $num > 3)->asArray()
        );
    }
}