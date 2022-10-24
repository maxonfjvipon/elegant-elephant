<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Text;

use Exception;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtLtrimmed;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtLtrimmedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function ltrimmedOfString(): void
    {
        $this->assertMixedCastThat(
            new TxtLtrimmed("  Hello   "),
            new IsEqual("Hello   ")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function ltrimmedOfText(): void
    {
        $this->assertMixedCastThat(
            new TxtLtrimmed(new TxtOf("\rFoo\r")),
            new IsEqual("Foo\r")
        );
    }
}
