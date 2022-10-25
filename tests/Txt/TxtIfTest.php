<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Txt;

use Exception;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtIf;
use PHPUnit\Framework\Constraint\IsEmpty;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtIfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function textIfTrue(): void
    {
        $this->assertTxtThat(
            new TxtIf(true, $text = "hello"),
            new IsEqual($text)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textIfFalse(): void
    {
        $this->assertTxtThat(
            new TxtIf(false, "hello"),
            new IsEmpty()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textIfWithLogic(): void
    {
        $this->assertTxtThat(
            new TxtIf(
                LogicOf::bool(true),
                TxtOf::func(fn () => "Hello, Jeff"),
            ),
            new IsEqual("Hello, Jeff")
        );
    }
}
