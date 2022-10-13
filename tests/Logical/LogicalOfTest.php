<?php

namespace Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\FirstOf;
use Maxonfjvipon\Elegant_Elephant\Scalar\LastOf;
use Maxonfjvipon\Elegant_Elephant\Boolean\BooleanOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;


final class LogicalOfTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function logicalOfTrueIsTrue(): void
    {
        $this->assertScalarThat(
            BooleanOf(true)->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function logicalOfFalseIsFalse(): void
    {
        $this->assertScalarThat(
            BooleanOf(false)->value(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function logicalOfAnyIsTrue(): void
    {
        $this->assertScalarThat(
            BooleanOf(new FirstOf([true, false]))->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function logicalOfAnyIsFalse(): void
    {
        $this->assertScalarThat(
            BooleanOf(new LastOf([true, false]))->value(),
            new IsFalse()
        );
    }
}
