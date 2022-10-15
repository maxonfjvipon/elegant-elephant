<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtReplaced;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
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
            new TxtReplaced(new TextOf("FOO"), new TextOf("bar"), new TxtUpper(new TextOf("foo-bar"))),
            new IsEqual("bar-BAR")
        );
    }
}
