<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\BooleanOf;
use Maxonfjvipon\Elegant_Elephant\Boolean\Disjunction;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class DisjunctionTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function disjunctionIsTrue(): void
    {
        $this->assertMixedCastThat(
            new Disjunction(
                new BooleanOf(true),
                true,
                new BooleanOf(false),
                false
            ),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function disjunctionIsFalse(): void
    {
        $this->assertMixedCastThat(
            new Disjunction(
                false,
                new BooleanOf(false),
            ),
            new IsFalse()
        );
    }
}
