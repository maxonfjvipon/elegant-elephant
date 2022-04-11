<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumSticky;
use PHPUnit\Framework\TestCase;

class NumStickyTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testAsNumber()
    {
        $num = 2;
        $nnum = new NumSticky(
            new class($num) implements Numerable {
                public function __construct(private int $num)
                {
                }

                public function asNumber(): float|int
                {
                    $this->num += 2;
                    return $this->num;
                }
            }
        );
        $this->assertEquals(4, $nnum->asNumber());
        $this->assertEquals(4, $nnum->asNumber());
    }
}