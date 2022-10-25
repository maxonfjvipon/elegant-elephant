<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Txt;

use Exception;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtReplaced;
use Maxonfjvipon\ElegantElephant\Txt\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtReplacedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function replacedStringToString(): void
    {
        $this->assertTxtThat(
            new TxtReplaced("foo", "bar", "foobar"),
            new IsEqual("barbar")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function replacedWithTexts(): void
    {
        $this->assertTxtThat(
            new TxtReplaced(TxtOf::str("FOO"), TxtOf::str("bar"), new TxtUpper(TxtOf::str("foo-bar"))),
            new IsEqual("bar-BAR")
        );
    }
}
