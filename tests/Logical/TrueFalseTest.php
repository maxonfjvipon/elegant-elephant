<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\Negation;
use Maxonfjvipon\Elegant_Elephant\Logical\Truth;
use Maxonfjvipon\Elegant_Elephant\Logical\Untruth;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class TrueFalseTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsBool(): void
    {
        assertEquals(true, Truth::new()->asBool());
        assertEquals(false, Untruth::new()->asBool());
        assertEquals(false, Negation::new(Truth::new())->asBool());
        assertEquals(true, Negation::new(Untruth::new())->asBool());
        assertEquals(false, Negation::new(false)->asBool());
    }
}