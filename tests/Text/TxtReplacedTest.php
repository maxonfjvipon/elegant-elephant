<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
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
            "barbarbar",
            TxtReplaced::new("foo", TextOf::new("bar"), "foofoofoo")->asString()
        );
    }
}