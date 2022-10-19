<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtJoined;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtJoinedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function joinedOfStrings(): void
    {
        $this->assertMixedCastThat(
            new TxtJoined(["foo", "-", "bar"]),
            new IsEqual("foo-bar")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function joinedOfTexts(): void
    {
        $this->assertMixedCastThat(
            new TxtJoined([new TextOf("foo"), "-", new TxtUpper(new TextOf("bar"))]),
            new IsEqual("foo-BAR")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function joinedOfArrayableOfTexts(): void
    {
        $this->assertMixedCastThat(
            new TxtJoined(
                new ArrayableOf([
                    new TextOf("foo"),
                    new TextOf(" "),
                    new TextOf("bar"),
                ])
            ),
            new IsEqual("foo bar")
        );
    }
}
