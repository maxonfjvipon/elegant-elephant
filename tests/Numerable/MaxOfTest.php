<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable\Addition;
use Maxonfjvipon\Elegant_Elephant\Numerable\MaxOf;
use PHPUnit\Framework\TestCase;

class MaxOfTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsNumber()
    {
        $this->assertEquals(
            10,
            (new MaxOf(2, 4, 10, 1, -1))->asNumber()
        );
        $this->assertEquals(
            5,
            MaxOf::new(Addition::new(2, 3), 1, 2, 3)->asNumber()
        );
    }
}