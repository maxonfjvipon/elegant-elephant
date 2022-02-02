<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrUnique;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrValues;
use PHPUnit\Framework\TestCase;

class ArrUniqueTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsArray(): void
    {
        $this->assertEquals(
            ArrValues::new([1, 2, 3, 4, 5])->asArray(),
            ArrValues::new(ArrUnique::new([1, 1, 2, 3, 4, 5, 5]))->asArray()
        );
        $this->assertEquals(
            ArrValues::new([1, 2, 3, 4, 5])->asArray(),
            ArrValues::new(ArrUnique::new(ArrayableOf::items(1, 1, 2, 3, 4, 5, 5)))->asArray()
        );
    }
}