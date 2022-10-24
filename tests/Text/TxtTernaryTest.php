<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Text;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtBlank;
use Maxonfjvipon\ElegantElephant\Txt\TxtCond;
use Maxonfjvipon\ElegantElephant\Txt\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtTernaryTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function textTernaryWithPrimitives(): void
    {
        $this->assertMixedCastThat(
            new TxtCond(true, "foo", "bar"),
            new IsEqual("foo")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textTernaryWithLogicalAndTexts(): void
    {
        $this->assertMixedCastThat(
            new TxtCond(new LogicOf(false), new TxtOf("foo"), new TxtUpper(new TxtOf("bar"))),
            new IsEqual("BAR")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textTernaryWithCallbacks(): void
    {
        $this->assertMixedCastThat(
            new TxtCond(
                new LogicOf(true),
                fn () => new TxtOf("hey there!"),
                fn () => new TxtBlank()
            ),
            new IsEqual("hey there!")
        );
    }
}
