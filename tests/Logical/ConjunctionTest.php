<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\Conjunction;
use Maxonfjvipon\Elegant_Elephant\Logical\Truth;
use Maxonfjvipon\Elegant_Elephant\Logical\Untruth;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;
use PHPUnit\Framework\TestCase;

final class ConjunctionTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function conjunctionIsTrue(): void
    {
        Assert::assertThat(
            Conjunction::new(Truth::new(), true)->asBool(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function conjunctionIsFalse(): void
    {
        Assert::assertThat(
            Conjunction::new(new Untruth(), false)->asBool(),
            new IsFalse()
        );
    }
}
