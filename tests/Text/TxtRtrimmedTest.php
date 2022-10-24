<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Text;

use Exception;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtRtrimmed;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtRtrimmedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function rtrimmedOfString(): void
    {
        $this->assertMixedCastThat(
            new TxtRtrimmed("  Hello   "),
            new IsEqual("  Hello")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function rtrimmedOfText(): void
    {
        $this->assertMixedCastThat(
            new TxtRtrimmed(new TxtOf("\rFoo\r")),
            new IsEqual("\rFoo")
        );
    }
}
