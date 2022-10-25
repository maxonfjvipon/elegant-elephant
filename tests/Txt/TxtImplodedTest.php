<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Txt;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

use Maxonfjvipon\ElegantElephant\Txt\TxtImploded;

final class TxtImplodedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function implodedOfStrings(): void
    {
        $this->assertTxtThat(
            new TxtImploded("-", ["foo", "bar"]),
            new IsEqual("foo-bar")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function implodedOfArrayOfTexts(): void
    {
        $this->assertTxtThat(
            new TxtImploded(TxtOf::str("/"), [new TxtUpper("foo"), "bar"]),
            new IsEqual("FOO/bar")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function implodedWithComma(): void
    {
        $this->assertTxtThat(
            TxtImploded::withComma([new TxtUpper("foo"), "bar"]),
            new IsEqual("FOO,bar")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function implodedOfArrOfTexts(): void
    {
        $this->assertTxtThat(
            new TxtImploded(
                "-",
                ArrOf::array([
                    TxtOf::str("foo"),
                    TxtOf::func(fn () => "bar"),
                ])
            ),
            new IsEqual("foo-bar")
        );
    }
}
