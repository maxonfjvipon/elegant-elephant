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
            TxtImploded::withString("-")->ofStrings("foo", "bar")->asString()
        );
        $this->assertEquals(
            "foo-bar",
            TxtImploded::withString("-")->ofTexts(TextOf::string("foo"), TextOf::string("bar"))->asString()
        );
        $this->assertEquals(
            "foo-bar",
            TxtImploded::withText(TextOf::string("-"))->ofStrings("foo", "bar")->asString()
        );
        $this->assertEquals(
            "foo-bar",
            TxtImploded::withText(TextOf::string("-"))
                ->ofTexts(TextOf::string("foo"), TextOf::string("bar"))->asString()
        );
        $this->assertNotEquals(
            "foo-bar",
            TxtImploded::withString(",")->ofStrings("foo", "bar")->asString()
        );
    }

    /**
     * @throws Exception
     */
    public function testWithComma(): void
    {
        $this->assertEquals(
            "foo,bar",
            TxtImploded::withComma()->ofStrings("foo", "bar")->asString()
        );
    }
}
