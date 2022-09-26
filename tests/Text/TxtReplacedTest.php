<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use GuzzleHttp\Promise\Is;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtReplaced;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

final class TxtReplacedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function replacedStringToString(): void
    {
        Assert::assertThat(
            TxtReplaced::new("foo", "bar", "foobar")->asString(),
            new IsEqual("barbar")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function replacedWithTexts(): void
    {
        Assert::assertThat(
            TxtReplaced::new(new TextOf("FOO"), new TextOf("bar"), new TxtUpper(new TextOf("foo-bar")))->asString(),
            new IsEqual("bar-BAR")
        );
    }
}
