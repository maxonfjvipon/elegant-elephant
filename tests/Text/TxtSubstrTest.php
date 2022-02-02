<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtSubstr;
use PHPUnit\Framework\TestCase;

class TxtSubstrTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            "world",
            TxtSubstr::new("Hello world", 6)->asString()
        );
        $this->assertEquals(
            "wo",
            TxtSubstr::new(TextOf::new("Hello world"), 6, 2)->asString()
        );
    }
}