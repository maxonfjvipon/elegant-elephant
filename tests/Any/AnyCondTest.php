<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Any;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\AnyCond;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Support\IsTxt;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

use function Maxonfjvipon\ElegantElephant\any_cond;

final class AnyCondTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function anyCondWithPrimitives(): void
    {
        $this->assertAnyThat(
            new AnyCond(true, "foo", "bar"),
            new IsEqual("foo")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function anyCondFuncionWithPrimitives(): void
    {
        $this->assertThat(
            any_cond(true, "foo", "bar"),
            new IsEqual("foo")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function anyCondWithLogicAndTxt(): void
    {
        $this->assertAnyThat(
            new AnyCond(LogicOf::bool(false), TxtOf::str("foo"), $text = new TxtUpper(TxtOf::str("bar"))),
            new IsTxt($text)
        );
    }
}
