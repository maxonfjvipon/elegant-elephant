<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtLtrimmed;
use PHPUnit\Framework\TestCase;

class TxtLtrimmedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            "Hello   ",
            TxtLtrimmed::new("  Hello   ")->asString()
        );
        $this->assertEquals(
            "Foo\r",
            TxtLtrimmed::new(TextOf::new("\rFoo\r"))->asString()
        );
    }
}