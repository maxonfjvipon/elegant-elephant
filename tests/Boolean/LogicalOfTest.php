<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Boolean;

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
        $this->assertMixedCastThat(
            new BooleanOf(true),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function logicalOfFalseIsFalse(): void
    {
        $this->assertMixedCastThat(
            new BooleanOf(false),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function logicalOfAnyIsTrue(): void
    {
        $this->assertMixedCastThat(
            new BooleanOf(new FirstOf([true, false])),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function logicalOfAnyIsFalse(): void
    {
        $this->assertMixedCastThat(
            new BooleanOf(new LastOf([true, false])),
            new IsFalse()
        );
    }
}
