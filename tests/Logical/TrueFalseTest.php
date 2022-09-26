<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Logical;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Logical\Not;
use Maxonfjvipon\Elegant_Elephant\Logical\Truth;
use Maxonfjvipon\Elegant_Elephant\Logical\Untruth;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

final class TrueFalseTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function truth(): void
    {
        Assert::assertThat(
            Truth::new()->asBool(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @return void
     */
    public function untruth(): void
    {
        Assert::assertThat(
            Untruth::new()->asBool(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function notTrue(): void
    {
        Assert::assertThat(
            Not::new(
                true
            )->asBool(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function notFalse(): void
    {
        Assert::assertThat(
            Not::new(
                false
            )->asBool(),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function notTrueObj(): void
    {
        Assert::assertThat(
            Not::new(
                new Truth()
            )->asBool(),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function notFalseObj(): void
    {
        Assert::assertThat(
            Not::new(
                new Untruth()
            )->asBool(),
            new IsTrue()
        );
    }
}
