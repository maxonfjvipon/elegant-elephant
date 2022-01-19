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
            TxtLowered::ofString("Hello World")->asString()
        );
        $this->assertEquals(
            "hello world",
            TxtLowered::ofText(TextOf::string("Hello World"))->asString()
        );
    }
}