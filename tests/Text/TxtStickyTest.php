<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Text;

use Exception;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt;
use Maxonfjvipon\ElegantElephant\Txt\TxtSticky;
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
            new class($str) implements Txt {
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
