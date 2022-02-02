<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\TestCase;

class TxtUpperTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            "FOO",
            TxtUpper::new("foo")->asString()
        );
        $this->assertEquals(
            "FOO",
            TxtUpper::new(TextOf::new("foo"))->asString()
        );
        $this->assertEquals(
            "12",
            TxtUpper::new(12)->asString()
        );
    }
}