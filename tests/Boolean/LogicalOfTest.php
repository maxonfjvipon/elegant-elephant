<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\FirstOf;
use Maxonfjvipon\ElegantElephant\Any\LastOf;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class LogicalOfTest extends \Maxonfjvipon\ElegantElephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function logicalOfTrueIsTrue(): void
    {
        $this->assertMixedCastThat(
            new LogicOf(true),
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
            new LogicOf(false),
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
            new LogicOf(new FirstOf([true, false])),
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
            new LogicOf(new LastOf([true, false])),
            new IsFalse()
        );
    }
}
