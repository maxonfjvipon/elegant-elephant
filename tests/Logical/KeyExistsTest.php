<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Logical\KeyExists;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class KeyExistsTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsBool(): void
    {
        assertEquals(true, KeyExists::inArray("foo", ["foo" => 1, "bar" => 2])->asBool());
        assertEquals(true, KeyExists::inArryable("bar", ArrayableOf::array(["foo" => 1, "bar" => 2]))->asBool());
    }
}