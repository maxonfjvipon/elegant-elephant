<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\Conjunction;
use Maxonfjvipon\Elegant_Elephant\Boolean\Disjunction;
use Maxonfjvipon\Elegant_Elephant\Boolean\True;
use Maxonfjvipon\Elegant_Elephant\Boolean\Untruth;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;


final class DisjunctionTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function disjunctionIsTrue(): void
    {
        $this->assertScalarThat(
            Disjunction(
                True(),
                true,
                Untruth(),
                false
            )->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function disjunctionIsFalse(): void
    {
        $this->assertScalarThat(
            Disjunction(
                false,
                Untruth(),
            )->value(),
            new IsFalse()
        );
    }
}
