<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrSorted;
use PHPUnit\Framework\TestCase;

class ArrSortedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $expected = [1, 2, 3, 4];
        $arr = [2, 4, 1, 3];

        $this->assertEquals(
            $expected,
            ArrSorted::ofArray($arr)->asArray()
        );
        $this->assertEquals(
            $expected,
            ArrSorted::ofArrayable(ArrayableOf::array($arr))->asArray()
        );
        $this->assertEquals(
            [4, 3, 2, 1],
            ArrSorted::ofArray($arr, fn($a, $b) => $a >= $b ? -1 : 1)->asArray()
        );
        $this->assertNotEquals(
            [4, 3, 2, 1],
            ArrSorted::ofArray($arr)->asArray()
        );
    }
}