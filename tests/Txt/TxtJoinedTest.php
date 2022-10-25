<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Txt;

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
        $this->assertTxtThat(
            new TxtJoined(["foo", "-", "bar"]),
            new IsEqual("foo-bar")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function joinedOfArrayOfTexts(): void
    {
        $this->assertTxtThat(
            new TxtJoined([TxtOf::str("foo"), "-", new TxtUpper(TxtOf::str("bar"))]),
            new IsEqual("foo-BAR")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function joinedOfArrOfTexts(): void
    {
        $this->assertTxtThat(
            new TxtJoined(
                ArrOf::func(fn () => [
                    TxtOf::str("foo"),
                    TxtOf::str(" "),
                    TxtOf::str("bar"),
                ])
            ),
            new IsEqual("foo bar")
        );
    }
}
