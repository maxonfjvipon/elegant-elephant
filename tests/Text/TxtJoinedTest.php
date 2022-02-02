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
            TxtJoined::new("foo", "bar")->asString()
        );
        $this->assertEquals(
            "foobar12.2",
            TxtJoined::new(TextOf::new("foo"), "bar", 1, 2.2)->asString(),
        );
        $this->assertEquals(
            "foobartrue",
            TxtJoined::new("foo", TextOf::new("bar"), true)->asString()
        );
    }
}