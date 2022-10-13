<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtRtrimmed;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtRtrimmedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function rtrimmedOfString(): void
    {
        $this->assertScalarThat(
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
        $this->assertScalarThat(
            new TxtRtrimmed(new TextOf("\rFoo\r")),
            new IsEqual("\rFoo")
        );
    }
}
