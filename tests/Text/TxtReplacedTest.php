<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use GuzzleHttp\Promise\Is;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtReplaced;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


use function PHPUnit\Framework\assertEquals;

final class TxtReplacedTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function replacedStringToString(): void
    {
        $this->assertScalarThat(
            TxtReplaced("foo", "bar", "foobar")->value(),
            new IsEqual("barbar")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function replacedWithTexts(): void
    {
        $this->assertScalarThat(
            TxtReplaced(new TextOf("FOO"), new TextOf("bar"), new TxtUpper(new TextOf("foo-bar")))->value(),
            new IsEqual("bar-BAR")
        );
    }
}
