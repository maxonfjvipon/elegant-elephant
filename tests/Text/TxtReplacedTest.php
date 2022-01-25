<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TxtBlank;
use Maxonfjvipon\Elegant_Elephant\Text\TxtReplaced;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class TxtReplacedTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        assertEquals(
            "barbar",
            TxtReplaced::string("foo")->toString("bar")->inString("foobar")->asString()
        );
        assertEquals(
            "bar",
            TxtReplaced::string("foo")->toText(TxtBlank::new())->inString("foobar")->asString()
        );
    }
}