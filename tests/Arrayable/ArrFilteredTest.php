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
            ArrFiltered::new($arr, $callback)->asArray()
        );
        $this->assertNotEquals(
            $expected,
            ArrFiltered::new($arr, fn($num) => $num > 3)->asArray()
        );
        $this->assertEquals(
            $expected,
            (new ArrFiltered($arr, function ($num) {
                return $num > 5;
            }))->asArray()
        );
    }
}