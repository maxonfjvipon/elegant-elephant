<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtTrimmed;
use PHPUnit\Framework\TestCase;

class TxtTrimmedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            "Hello world",
            TxtTrimmed::new("  Hello world\r")->asString()
        );
        $this->assertEquals(
            "Hello world",
            TxtTrimmed::new(TextOf::new("\r\rHello world\n\t"))->asString()
        );
    }
}