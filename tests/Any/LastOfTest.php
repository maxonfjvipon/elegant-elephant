<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Any;

use Maxonfjvipon\Elegant_Elephant\Any\LastOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\TestCase;

final class LastOfTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testAsAny()
    {
        $this->assertEquals(
            "o",
            (new LastOf("Hello"))->asAny()
        );
        $this->assertEquals(
            "o",
            (new LastOf(new TextOf("Hello")))->asAny()
        );
        $this->assertEquals(
            3,
            (new LastOf([1, 2, 3,]))->asAny()
        );
        $this->assertEquals(
            3,
            (new LastOf(new ArrayableOf([1, 2, 3])))->asAny()
        );
    }
}