<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable\Addition;
use Maxonfjvipon\Elegant_Elephant\Numerable\Decremented;
use Maxonfjvipon\Elegant_Elephant\Numerable\Incremented;
use Maxonfjvipon\Elegant_Elephant\Numerable\Multiplication;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\Subtraction;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class ArithmeticTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsNumber(): void
    {
        assertEquals(10, Addition::new(5, NumerableOf::new("5"))->asNumber());
        assertEquals(10, Incremented::new(NumerableOf::new(9.0))->asNumber());
        assertEquals(7, Subtraction::new(NumerableOf::new(10), 3.0)->asNumber());
        assertEquals(9, Decremented::new(NumerableOf::new(10))->asNumber());
        assertEquals(
            25,
            Multiplication::new(
                5,
                Addition::new(
                    2,
                    Decremented::new(4)
                )
            )->asNumber()
        );
    }
}
