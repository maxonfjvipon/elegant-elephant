<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Logical\IsNotEmpty;
use Maxonfjvipon\Elegant_Elephant\Text\TxtBlank;
use PHPUnit\Framework\TestCase;

class IsNotEmptyTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsBool()
    {
        $this->assertEquals(
            false,
            (new IsNotEmpty([]))->asBool()
        );
        $this->assertEquals(
            false,
            (new IsNotEmpty(""))->asBool()
        );
        $this->assertEquals(
            false,
            (new IsNotEmpty(new TxtBlank()))->asBool()
        );
        $this->assertEquals(
            false,
            (new IsNotEmpty(new ArrayableOf([])))->asBool()
        );
        $this->assertEquals(
            true,
            (new IsNotEmpty(["foo", "bar"]))->asBool()
        );
    }
}