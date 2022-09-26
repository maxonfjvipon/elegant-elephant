<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\Conjunction;
use Maxonfjvipon\Elegant_Elephant\Logical\Disjunction;
use Maxonfjvipon\Elegant_Elephant\Logical\Truth;
use Maxonfjvipon\Elegant_Elephant\Logical\Untruth;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;
use PHPUnit\Framework\TestCase;

final class DisjunctionTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function disjunctionIsTrue(): void
    {
        Assert::assertThat(
            Disjunction::new(
                Truth::new(),
                true,
                Untruth::new(),
                false
            )->asBool(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function disjunctionIsFalse(): void
    {
        Assert::assertThat(
            Disjunction::new(
                false,
                Untruth::new(),
            )->asBool(),
            new IsFalse()
        );
    }
}
