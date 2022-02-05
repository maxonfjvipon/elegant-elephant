<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\ArraySum;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class ArraySumTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsNumber()
    {
        assertEquals(10, ArraySum::new([1, 2, 3, 4])->asNumber());
        assertEquals(9, ArraySum::new(ArrayableOf::items(2, 3, 4))->asNumber());
    }
}