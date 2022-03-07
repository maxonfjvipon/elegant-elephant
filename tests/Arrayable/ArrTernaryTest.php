<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrTernary;
use PHPUnit\Framework\TestCase;

class ArrTernaryTest extends TestCase
{
    /**
     * @return void
     * @throws Exception
     */
    public function testAsArray()
    {
        $this->assertEquals(
            [1, 2, 3],
            (new ArrTernary(
                true,
                [1, 2, 3],
                new ArrayableOf([3, 2, 1])
            ))->asArray()
        );
        $this->assertEquals(
            [3, 2, 1],
            ArrTernary::new(
                false,
                [1, 2, 3],
                ArrayableOf::items(3, 2, 1)
            )->asArray()
        );
    }

}