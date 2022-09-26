<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtTrimmed;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class TxtTrimmedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function trimmedOfString(): void
    {
        Assert::assertThat(
            TxtTrimmed::new(" Hello world\r\t")->asString(),
            new IsEqual("Hello world")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function trimmedOfText(): void
    {
        Assert::assertThat(
            TxtTrimmed::new(new TextOf("\rHello there\t\n"))->asString(),
            new IsEqual("Hello there")
        );
    }
}
