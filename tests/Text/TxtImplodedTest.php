<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TxtImploded;

class TxtImplodedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            "foo-bar",
            TxtImploded::new("-", "foo", "bar")->asString()
        );
        $this->assertEquals(
            "foo-bar",
            TxtImploded::new("-", TextOf::new("foo"), "bar")->asString()
        );
        $this->assertEquals(
            "foo-bar-1-1.1-true",
            TxtImploded::new("-", TextOf::new("foo"), TextOf::new("bar"), 1, 1.1, true)->asString()
        );
        $this->assertEquals(
            "foo,bar",
            TxtImploded::withComma("foo", TextOf::new("bar"))->asString()
        );
    }
}
