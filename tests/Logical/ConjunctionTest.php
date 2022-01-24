<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\Conjunction;
use Maxonfjvipon\Elegant_Elephant\Logical\Truth;
use Maxonfjvipon\Elegant_Elephant\Logical\Untruth;
use PHPUnit\Framework\TestCase;

class ConjunctionTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsBool(): void
    {
        $this->assertEquals(
            true,
            Conjunction::new(
                Truth::new(),
                Truth::new()
            )->asBool()
        );
        $this->assertEquals(
            false,
            Conjunction::new(
                Truth::new(),
                Untruth::new()
            )->asBool()
        );
    }
}