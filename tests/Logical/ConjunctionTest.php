<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\Conjunction;
use Maxonfjvipon\Elegant_Elephant\Boolean\True;
use Maxonfjvipon\Elegant_Elephant\Boolean\Untruth;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;


final class ConjunctionTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function conjunctionIsTrue(): void
    {
        $this->assertScalarThat(
            Conjunction(True(), true)->value(),
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
            Conjunction(new Untruth(), false)->value(),
            new IsFalse()
        );
    }
}
