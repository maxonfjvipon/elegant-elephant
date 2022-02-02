<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\LogicalOf;
use Maxonfjvipon\Elegant_Elephant\Logical\Truth;
use Maxonfjvipon\Elegant_Elephant\Logical\Untruth;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtTernary;
use PHPUnit\Framework\TestCase;

class TxtTernatyTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsString(): void
    {
        $this->assertEquals(
            "foo",
            TxtTernary::new(
                Truth::new(),
                "foo",
                "bar"
            )->asString()
        );
        $this->assertEquals(
            "bar",
            TxtTernary::new(
                false,
                TextOf::new("foo"),
                TextOf::new("bar")
            )->asString()
        );
    }
}