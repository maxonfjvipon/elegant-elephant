<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Txt;

use Exception;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtLtrimmed;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtLtrimmedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function ltrimmedOfString(): void
    {
        $this->assertTxtThat(
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
        $this->assertTxtThat(
            new TxtLtrimmed(TxtOf::str("\rFoo\r")),
            new IsEqual("Foo\r")
        );
    }
}
