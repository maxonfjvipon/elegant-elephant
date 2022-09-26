<?php

namespace Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\TxtSticky;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class TxtStickyTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function doesNotChangeValue(): void
    {
        $str = "hello";
        $cached = new TxtSticky(
            new class($str) implements Text {
                private string $text;

                public function __construct(string $text)
                {
                    $this->text = $text;
                }

                /**
                 * @return string
                 */
                public function asString(): string
                {
                    $this->text = $this->text . " world!";
                    return $this->text;
                }
            }
        );
        $cached->asString();
        $result = $cached->asString();

        Assert::assertThat(
            $result,
            new IsEqual("hello world!")
        );
    }
}
