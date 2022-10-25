<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\AnyOf;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsTrue;

final class LogicOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function logicOfBool(): void
    {
        $this->assertLogicThat(
            LogicOf::bool(true),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function logicOfAny(): void
    {
        $this->assertLogicThat(
            LogicOf::any(AnyOf::bool(false)),
            new IsFalse()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function logicOfFunc(): void
    {
        $this->assertLogicThat(
            LogicOf::func(fn () => true),
            new IsTrue()
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function logicOfWithNoBool(): void
    {
        $this->expectExceptionMessage("Function must return a bool value");
        LogicOf::func(fn () => "Hello world")->asBool();
    }
}
