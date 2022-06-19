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
            ArrSorted::new($arr)->asArray()
        );
        $this->assertEquals(
            $expected,
            (new ArrSorted(ArrayableOf::new($arr, false)))->asArray()
        );
        $this->assertEquals(
            [4, 3, 2, 1],
            ArrSorted::new($arr, fn($a, $b) => $a >= $b ? -1 : 1)->asArray()
        );
        $this->assertNotEquals(
            [4, 3, 2, 1],
            ArrSorted::new($arr)->asArray()
        );
        $this->assertEquals(
            array(array('a' => 1), array('a' => 2), array('a' => 3)),
            ArrSorted::new(array(
                array('a' => 1),
                array('a' => 3),
                array('a' => 2)
            ), 'a')->asArray()
        );
    }
}
