<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtLtrimmed;
use Maxonfjvipon\Elegant_Elephant\Text\TxtRtrimmed;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\Callback;
use PHPUnit\Framework\Constraint\IsEqual;


final class TxtRtrimmedTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function rtrimmedOfString(): void
    {
        $this->assertScalarThat(
            TxtRtrimmed("  Hello   ")->value(),
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
            TxtRtrimmed(TextOf("\rFoo\r"))->value(),
            new IsEqual("\rFoo")
        );
    }
}
