<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtLtrimmed;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\Callback;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class TxtLtrimmedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function ltrimmedOfString(): void
    {
        Assert::assertThat(
            TxtLtrimmed::new("  Hello   ")->asString(),
            new IsEqual("Hello   ")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function ltrimmedOfText(): void
    {
        Assert::assertThat(
            TxtLtrimmed::new(TextOf::new("\rFoo\r"))->asString(),
            new IsEqual("Foo\r")
        );
    }
}
