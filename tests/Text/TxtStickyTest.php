<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\StringableText;
use Maxonfjvipon\Elegant_Elephant\Text\TxtSticky;
use PHPUnit\Framework\Constraint\IsEqual;

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
            new class ($str) implements Text {
                use StringableText;

                /**
                 * @var string $text
                 */
                private string $text;

                /**
                 * Ctor.
                 *
                 * @param string $text
                 */
                final public function __construct(string $text)
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

        $this->assertMixedCastThat(
            $cached,
            new IsEqual("hello world!")
        );
    }
}
