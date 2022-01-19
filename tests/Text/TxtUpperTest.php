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
            TxtUpper::ofString("foo")->asString()
        );
        $this->assertEquals(
            "FOO",
            TxtUpper::ofText(TextOf::string("foo"))->asString()
        );
    }
}