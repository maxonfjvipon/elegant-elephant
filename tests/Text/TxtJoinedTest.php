<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtJoined;
use PHPUnit\Framework\TestCase;

class TxtJoinedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            "foobar",
            TxtJoined::ofStrings("foo", "bar")->asString()
        );
        $this->assertEquals(
            "foobar",
            TxtJoined::ofTexts(TextOf::string("foo"), TextOf::string("bar"))->asString(),
        );
        $this->assertNotEquals(
            "foobar",
            TxtJoined::ofStrings("fooo", "bar")->asString()
        );
    }
}