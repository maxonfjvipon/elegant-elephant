<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\Not;
use Maxonfjvipon\Elegant_Elephant\Boolean\True;
use Maxonfjvipon\Elegant_Elephant\Boolean\Untruth;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;


use function PHPUnit\Framework\assertEquals;

final class TrueFalseTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @return void
     */
    public function truth(): void
    {
        $this->assertScalarThat(
            True()->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @return void
     */
    public function untruth(): void
    {
        $this->assertScalarThat(
            Untruth()->value(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function notTrue(): void
    {
        $this->assertScalarThat(
            Not(
                true
            )->value(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function notFalse(): void
    {
        $this->assertScalarThat(
            Not(
                false
            )->value(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function notTrueObj(): void
    {
        $this->assertScalarThat(
            Not(
                new True()
            )->value(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function notFalseObj(): void
    {
        $this->assertScalarThat(
            Not(
                new Untruth()
            )->value(),
            new IsTrue()
        );
    }
}
