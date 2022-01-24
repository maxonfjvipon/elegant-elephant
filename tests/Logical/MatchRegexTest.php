<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\MatchTo;
use Maxonfjvipon\Elegant_Elephant\Logical\MatchToIn;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\TestCase;

class MatchRegexTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsBool(): void
    {
        $this->assertEquals(
            true,
            MatchTo::string("/Hello world/")->inString("Hello world")->asBool()
        );
        $this->assertEquals(
            false,
            MatchTo::string("/^Hello$/")->inText(TextOf::string("Hello world"))->asBool()
        );
        $this->assertEquals(
            true,
            MatchTo::text(TextOf::string("/world/"))->inText(TextOf::string("Hello world"))->asBool()
        );
    }
}