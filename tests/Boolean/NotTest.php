<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\BooleanOf;
use Maxonfjvipon\Elegant_Elephant\Boolean\Not;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class NotTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function truth(): void
    {
        $this->assertMixedCastThat(
            new BooleanOf(true),
            new IsTrue()
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function untruth(): void
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
    public function notTrue(): void
    {
        $this->assertMixedCastThat(
            new Not(true),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function notFalse(): void
    {
        $this->assertMixedCastThat(
            new Not(false),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function notTrueObj(): void
    {
        $this->assertMixedCastThat(
            new Not(new BooleanOf(true)),
            new IsFalse()
        );
    }
}
