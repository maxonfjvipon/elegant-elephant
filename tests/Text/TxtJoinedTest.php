<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtJoined;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class TxtJoinedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function joinedOfStrings(): void
    {
        Assert::assertThat(
            TxtJoined::new("foo", "-", "bar")->asString(),
            new IsEqual("foo-bar")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function joinedOfTexts(): void
    {
        Assert::assertThat(
            TxtJoined::new(new TextOf("foo"), "-", new TxtUpper(new TextOf("bar")))->asString(),
            new IsEqual("foo-BAR")
        );
    }
}
