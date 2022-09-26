<?php

namespace Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any\FirstOf;
use Maxonfjvipon\Elegant_Elephant\Any\LastOf;
use Maxonfjvipon\Elegant_Elephant\Logical\LogicalOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;
use PHPUnit\Framework\TestCase;

final class LogicalOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function logicalOfTrueIsTrue(): void
    {
        Assert::assertThat(
            LogicalOf::new(true)->asBool(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function logicalOfFalseIsFalse(): void
    {
        Assert::assertThat(
            LogicalOf::new(false)->asBool(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function logicalOfAnyIsTrue(): void
    {
        Assert::assertThat(
            LogicalOf::new(new FirstOf([true, false]))->asBool(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function logicalOfAnyIsFalse(): void
    {
        Assert::assertThat(
            LogicalOf::new(new LastOf([true, false]))->asBool(),
            new IsFalse()
        );
    }
}
