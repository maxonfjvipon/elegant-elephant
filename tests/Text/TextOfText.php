<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpperOf;
use PHPUnit\Framework\TestCase;

class TextOfText extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString()
    {
        $this->assertEquals(
            "HELLO",
            TxtUpperOf::string(
                "Hello"
            )->asString()
        );
    }
}