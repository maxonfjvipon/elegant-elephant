<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMapped;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
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
            ArrMapped::new($arr, $callback)->asArray()
        );
        $this->assertNotEquals(
            $expected,
            (new ArrMapped($arr, fn($num) => $num + $num))->asArray()
        );
        $this->assertEquals(
            [
                "1L",
                "2L",
                "3L",
                "4L",
            ],
            ArrMapped::new(
                [1, 2, 3, 4],
                fn($num) => new TextOf($num . "L"),
                true
            )->asArray()
        );
    }
}