<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\Conjunction;
use Maxonfjvipon\Elegant_Elephant\Boolean\Truth;
use Maxonfjvipon\Elegant_Elephant\Boolean\Untruth;
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