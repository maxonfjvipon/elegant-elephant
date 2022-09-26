<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtLtrimmed;
use Maxonfjvipon\Elegant_Elephant\Text\TxtRtrimmed;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\Callback;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class TxtRtrimmedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function rtrimmedOfString(): void
    {
        Assert::assertThat(
            TxtRtrimmed::new("  Hello   ")->asString(),
            new IsEqual("  Hello")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function rtrimmedOfText(): void
    {
        Assert::assertThat(
            TxtRtrimmed::new(TextOf::new("\rFoo\r"))->asString(),
            new IsEqual("\rFoo")
        );
    }
}
