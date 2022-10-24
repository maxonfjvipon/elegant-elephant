<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Text;

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
        $this->assertMixedCastThat(
            new TxtImploded("-", ["foo", "bar"]),
            new IsEqual("foo-bar")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function implodedOfTexts(): void
    {
        $this->assertMixedCastThat(
            new TxtImploded(new TxtOf("/"), [new TxtUpper("foo"), "bar"]),
            new IsEqual("FOO/bar")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function implodedWithComma(): void
    {
        $this->assertMixedCastThat(
            TxtImploded::withComma([new TxtUpper("foo"), "bar"]),
            new IsEqual("FOO,bar")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function implodedOfArrayableOfTexts(): void
    {
        $this->assertMixedCastThat(
            new TxtImploded(
                "-",
                new ArrOf([
                    new TxtOf("foo"),
                    new TxtOf("bar"),
                ])
            ),
            new IsEqual("foo-bar")
        );
    }
}
