<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\LengthOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class LengthOfTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsNumber()
    {
        assertEquals(3, LengthOf::string("foo")->asNumber());
        assertEquals(6, LengthOf::text(TextOf::string("foobar"))->asNumber());
        assertEquals(2, LengthOf::array([1, 2])->asNumber());
        assertEquals(3, LengthOf::arrayble(ArrayableOf::array([1, 2, 3]))->asNumber());
    }
}