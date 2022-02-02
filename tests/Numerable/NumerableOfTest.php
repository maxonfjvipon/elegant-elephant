<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOf;
use PHPUnit\Framework\TestCase;

class NumerableOfTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsNumber(): void
    {
        $this->assertEquals(
            5,
            NumerableOf::new(5)->asNumber()
        );
        $this->assertEquals(
            6,
            NumerableOf::new("6")->asNumber()
        );
        $this->assertEquals(
            7.1,
            NumerableOf::new(7.1)->asNumber()
        );
    }
}