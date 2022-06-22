<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrRange;
use PHPUnit\Framework\TestCase;

final class ArrRangeTest extends TestCase
{
    public function testAsArray()
    {
        $this->assertEquals(
            [1, 2, 3, 4],
            (new ArrRange(1, 4))->asArray()
        );
        $this->assertEquals(
            [1, 1.5, 2, 2.5, 3],
            (new ArrRange(1, 3, 0.5))->asArray()
        );
    }
}