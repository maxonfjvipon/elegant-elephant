<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Logical\KeyExists;
use Maxonfjvipon\Elegant_Elephant\Numerable;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class KeyExistsTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsBool(): void
    {
        assertEquals(true, KeyExists::new("foo", ["foo" => 1, "bar" => 2])->asBool());
        assertEquals(true, KeyExists::new(TextOf::new("bar"), ArrayableOf::array(["foo" => 1, "bar" => 2]))->asBool());
        assertEquals(true, KeyExists::new(NumerableOf::new(4), [4 => "foo", 5 => "bar"])->asBool());
    }
}