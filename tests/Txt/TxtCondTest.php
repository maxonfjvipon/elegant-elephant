<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Txt;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Support\IsTxt;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtCond;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtCondTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function txtCondWithPrimitives(): void
    {
        $this->assertTxtThat(
            new TxtCond(true, $foo = "foo", "bar"),
            new IsEqual($foo)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function txtCondWithLogicAndTexts(): void
    {
        $this->assertTxtThat(
            new TxtCond(LogicOf::bool(false), TxtOf::str("foo"), $txt = new TxtUpper(TxtOf::str("bar"))),
            new IsTxt($txt)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function txtCondWithCallbacks(): void
    {
        $this->assertTxtThat(
            new TxtCond(
                LogicOf::bool(true),
                $first = TxtOf::func(fn () => "Hello there"),
                TxtOf::func(fn () => "Hello, Jeff")
            ),
            new IsTxt($first)
        );
    }
}
