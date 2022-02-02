<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHP_CodeSniffer\Generators\Text;
use PHPUnit\Framework\TestCase;

class TextOfTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString()
    {
        $this->assertEquals(
            "foo",
            TextOf::new("foo")->asString()
        );
        $this->assertEquals(
            "1",
            TextOf::new(1)->asString()
        );
        $this->assertEquals(
            "1.2",
            TextOf::new(1.2)->asString()
        );
        $this->assertEquals(
            "foo",
            TextOf::new(TextOf::new("foo"))->asString()
        );
    }
}