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
            TextOf::string("foo")->asString()
        );
        $this->assertNotEquals(
            "foo",
            TextOf::string("bar")->asString()
        );
    }
}