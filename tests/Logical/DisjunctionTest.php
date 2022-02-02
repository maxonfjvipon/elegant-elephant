<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\Conjunction;
use Maxonfjvipon\Elegant_Elephant\Logical\Disjunction;
use Maxonfjvipon\Elegant_Elephant\Logical\Truth;
use Maxonfjvipon\Elegant_Elephant\Logical\Untruth;
use PHPUnit\Framework\TestCase;

class DisjunctionTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAsBool(): void
    {
        $this->assertEquals(
            true,
            Disjunction::new(
                Truth::new(),
                true,
                Untruth::new(),
                false
            )->asBool()
        );
        $this->assertEquals(
            false,
            Disjunction::new(
                Untruth::new(),
                false
            )->asBool()
        );
    }
}