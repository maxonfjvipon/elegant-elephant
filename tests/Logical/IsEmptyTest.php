<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Logical\IsEmpty;
use Maxonfjvipon\Elegant_Elephant\Text\TxtBlank;
use PHPUnit\Framework\TestCase;

class IsEmptyTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsBool()
    {
        $this->assertEquals(
            true,
            (new IsEmpty([]))->asBool()
        );
        $this->assertEquals(
            true,
            (new IsEmpty(""))->asBool()
        );
        $this->assertEquals(
            true,
            (new IsEmpty(new TxtBlank()))->asBool()
        );
        $this->assertEquals(
            true,
            (new IsEmpty(new ArrayableOf([])))->asBool()
        );
        $this->assertEquals(
            false,
            (new IsEmpty(["foo", "bar"]))->asBool()
        );
    }
}