<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Text;

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
        $this->assertMixedCastThat(
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
        $this->assertMixedCastThat(
            new TxtReplaced(new TxtOf("FOO"), new TxtOf("bar"), new TxtUpper(new TxtOf("foo-bar"))),
            new IsEqual("bar-BAR")
        );
    }
}
