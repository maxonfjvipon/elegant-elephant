<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\BooleanOf;
use Maxonfjvipon\Elegant_Elephant\Boolean\Conjunction;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class ConjunctionTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function conjunctionIsTrue(): void
    {
        $this->assertScalarThat(
            new Conjunction(new BooleanOf(true), true),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function conjunctionIsFalse(): void
    {
        $this->assertScalarThat(
            new Conjunction(new BooleanOf(false), false),
            new IsFalse()
        );
    }
}
