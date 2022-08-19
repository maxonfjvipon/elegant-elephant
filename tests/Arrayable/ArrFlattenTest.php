<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrFlatten;
use PHPUnit\Framework\TestCase;

final class ArrFlattenTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testAsArray()
    {
        $this->assertEquals(
            [1, 2, 3, 4, 5],
            ArrFlatten::new([1, [2, 3], 4, [5]])->asArray()
        );
        $this->assertEquals(
            [1, 2, 3, 4, 5, 6],
            ArrFlatten::new(
                new ArrayableOf(
                    [1, new ArrayableOf([2, 3]), [[4]], [new ArrayableOf([5, 6])]]),
                2
            )->asArray()
        );
    }
}