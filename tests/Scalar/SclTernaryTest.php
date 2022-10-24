<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Scalar;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Any\AnyCond;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtBlank;
use Maxonfjvipon\ElegantElephant\Txt\TxtCond;
use Maxonfjvipon\ElegantElephant\Txt\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

final class SclTernaryTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function sclTernaryWithPrimitives(): void
    {
        $this->assertMixedCastThat(
            new AnyCond(true, "foo", "bar"),
            new IsEqual("foo")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sclTernaryWithLogicalAndScalars(): void
    {
        $this->assertMixedCastThat(
            new AnyCond(new LogicOf(false), new TxtOf("foo"), new TxtUpper(new TxtOf("bar"))),
            new IsEqual("BAR")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sclTernaryWithCallbacks(): void
    {
        $this->assertMixedCastThat(
            new AnyCond(
                new LogicOf(true),
                fn () => new TxtOf("hey there!"),
                fn () => new ArrOf(['Hello world!'])
            ),
            new IsEqual("hey there!")
        );
    }
}
