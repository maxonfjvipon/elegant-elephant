<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\Rounded;
use PHPUnit\Framework\TestCase;

class RoundedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsNumber()
    {
        $this->assertEquals(
            round(10.4567, 2),
            (new Rounded(10.4567, 2))->asNumber()
        );
        $this->assertEquals(
            round(11.2792),
            (new Rounded(new NumerableOf(11.2792)))->asNumber()
        );
    }
}