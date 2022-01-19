<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\Truth;
use Maxonfjvipon\Elegant_Elephant\Boolean\Untruth;
use PHPUnit\Framework\TestCase;

class TrueFalseTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsBool(): void
    {
        $this->assertEquals(true, Truth::new()->asBool());
        $this->assertEquals(false, Untruth::new()->asBool());
    }
}