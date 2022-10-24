<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Text;

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
        $this->assertMixedCastThat(
            new TxtIf(true, "hello"),
            new IsEqual("hello")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textIfFalseWithNumerable(): void
    {
        $this->assertMixedCastThat(
            new TxtIf(false, "hello"),
            new IsEmpty()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textIfWithLogicalAndCallback(): void
    {
        $this->assertMixedCastThat(
            new TxtIf(
                new LogicOf(true),
                fn () => new TxtOf("hello")
            ),
            new IsEqual("hello")
        );
    }
}
