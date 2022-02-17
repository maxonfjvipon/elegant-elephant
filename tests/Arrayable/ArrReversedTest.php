<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrReversed;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrUnique;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrValues;
use PHPUnit\Framework\TestCase;

/**
 * Array reversed test
 */
class ArrReversedTest extends TestCase
{
    public function testAsArray()
    {
        $this->assertEquals(
            ArrValues::new([1, 2, 3, 4, 5])->asArray(),
            ArrValues::new(ArrReversed::new([5, 4, 3, 2, 1]))->asArray()
        );
        $this->assertEquals(
            ArrValues::new([1, 2, 3, 4, 5])->asArray(),
            ArrValues::new(ArrReversed::new(ArrayableOf::items(5, 4, 3, 2, 1)))->asArray()
        );
    }
}