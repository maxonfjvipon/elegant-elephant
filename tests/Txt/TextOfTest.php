<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Txt;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\AnyOf;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Constraint\IsEqual;

final class TextOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function textOfStringTest(): void
    {
        $this->assertTxtThat(
            TxtOf::str("foo"),
            new IsEqual("foo")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function textOfNumTest(): void
    {
        $this->assertTxtThat(
            TxtOf::num($num = NumOf::float(5.5)),
            new IsEqual("5.5")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function textOfFloat(): void
    {
        $this->assertTxtThat(
            TxtOf::float($float = 4.2),
            new IsEqual((string)$float)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function textOfInt(): void
    {
        $this->assertTxtThat(
            TxtOf::int($int = 5),
            new IsEqual((string)$int)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function textOfNumber(): void
    {
        $this->assertTxtThat(
            TxtOf::number($number = 8.12),
            new IsEqual((string)$number)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function textOfAny(): void
    {
        $this->assertTxtThat(
            TxtOf::any(AnyOf::text($txt = "Hello there")),
            new IsEqual($txt)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function textOfFunc(): void
    {
        $this->assertTxtThat(
            TxtOf::func(fn () => "Hello, Jeff"),
            new IsEqual("Hello, Jeff")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function textOfFuncThatReturnsText(): void
    {
        $this->assertTxtThat(
            TxtOf::func(fn () => TxtOf::str("Hello, Jeff")),
            new IsEqual("Hello, Jeff")
        );
    }
}
