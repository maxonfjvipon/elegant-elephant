<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Boolean;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Logic\Not;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
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
            new LogicOf(true),
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
            new LogicOf(false),
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
            new Not(new LogicOf(true)),
            new IsFalse()
        );
    }
}
