<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Text;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtJoined;
use Maxonfjvipon\ElegantElephant\Txt\TxtUpper;
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
            new TxtJoined([new TxtOf("foo"), "-", new TxtUpper(new TxtOf("bar"))]),
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
                new ArrOf([
                    new TxtOf("foo"),
                    new TxtOf(" "),
                    new TxtOf("bar"),
                ])
            ),
            new IsEqual("foo bar")
        );
    }
}
