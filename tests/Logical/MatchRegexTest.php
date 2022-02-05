<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\PregMatch;
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
            PregMatch::new("/Hello world/", "Hello world")->asBool()
        );
        $this->assertEquals(
            false,
            PregMatch::new("/^Hello$/", TextOf::new("Hello world"))->asBool()
        );
        $this->assertEquals(
            true,
            PregMatch::new(TextOf::new("/world/"), TextOf::new("Hello world"))->asBool()
        );
    }
}