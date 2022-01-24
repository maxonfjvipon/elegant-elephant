<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TxtEnsureRegex;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class TxtEnsureRegexTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        assertEquals("/foo/", TxtEnsureRegex::ofString("foo")->asString());
        assertEquals("/foo/", TxtEnsureRegex::ofString("foo/")->asString());
        assertEquals("/foo/", TxtEnsureRegex::ofString("/foo")->asString());
        assertEquals("/foo/", TxtEnsureRegex::ofString("/foo/")->asString());
    }
}