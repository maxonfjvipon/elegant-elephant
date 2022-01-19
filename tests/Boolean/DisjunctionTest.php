<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\Conjunction;
use Maxonfjvipon\Elegant_Elephant\Boolean\Disjunction;
use Maxonfjvipon\Elegant_Elephant\Boolean\Truth;
use Maxonfjvipon\Elegant_Elephant\Boolean\Untruth;
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
                Truth::new(),
                Untruth::new()
            )->asBool()
        );
        $this->assertEquals(
            false,
            Disjunction::new(
                Untruth::new(),
                Untruth::new()
            )->asBool()
        );
    }
}