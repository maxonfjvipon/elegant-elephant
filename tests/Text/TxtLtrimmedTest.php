<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtLtrimmed;
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
            new TxtLtrimmed(new TextOf("\rFoo\r")),
            new IsEqual("Foo\r")
        );
    }
}
