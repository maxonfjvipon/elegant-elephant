<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Text;

use Exception;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Constraint\IsEqual;
use Stringable;

final class TextOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function textOfStringTest(): void
    {
        $this->assertMixedCastThat(
            new TxtOf("foo"),
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
        $this->assertMixedCastThat(
            new TxtOf(5),
            new IsEqual("5")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textOfStringableTest(): void
    {
        $this->assertMixedCastThat(
            new TxtOf(new class implements Stringable {
                public function __toString()
                {
                    return "foo";
                }
            }),
            new IsEqual("foo")
        );
    }
}
