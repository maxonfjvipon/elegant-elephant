<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\Less;
use Maxonfjvipon\Elegant_Elephant\Logical\More;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOf;
use PHPUnit\Framework\TestCase;

class MoreLessTest extends TestCase
{
    /**
     * @throws Exception
     * @test
     */
    public function testMore(): void
    {
        $this->assertTrue(
            More::new(5, new NumerableOf(2))->asBool()
        );
        $this->assertFalse(
            (new More(5, new NumerableOf(22)))->asBool()
        );
    }

    /**
     * @return void
     * @throws Exception
     * @test
     */
    public function testLess(): void
    {
        $this->assertFalse(
            (new Less(5, new NumerableOf(2)))->asBool()
        );
        $this->assertTrue(
            (new Less(5, new NumerableOf(22)))->asBool()
        );
    }
}