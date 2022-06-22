<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Any;

use Maxonfjvipon\Elegant_Elephant\Any\FirstOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\TestCase;

final class FirstOfTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testAsAny()
    {
        $this->assertEquals(
            "H",
            (new FirstOf("Hello"))->asAny()
        );
        $this->assertEquals(
            "H",
            (new FirstOf(new TextOf("Hello")))->asAny()
        );
        $this->assertEquals(
            1,
            (new FirstOf([1, 2, 3,]))->asAny()
        );
        $this->assertEquals(
            1,
            (new FirstOf(new ArrayableOf([1, 2, 3], false)))->asAny()
        );
    }
}