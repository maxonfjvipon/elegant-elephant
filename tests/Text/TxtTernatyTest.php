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
            TxtTernary::ofStrings(
                Truth::new(),
                "foo",
                "bar"
            )->asString()
        );
        $this->assertEquals(
            "bar",
            TxtTernary::ofTexts(
                Untruth::new(),
                TextOf::string("foo"),
                TextOf::string("bar")
            )->asString()
        );
    }
}