<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtLowered;
use PHPUnit\Framework\TestCase;

class TxtLoweredTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            "hello world",
            TxtLowered::new("Hello World")->asString()
        );
        $this->assertEquals(
            "hello world",
            TxtLowered::new(TextOf::new("Hello World"))->asString()
        );
        $this->assertEquals(
            "1",
            TxtLowered::new(1)->asString()
        );
    }
}