<?php

namespace Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text;
use Maxonfjvipon\Elegant_Elephant\Text\TxtSticky;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class TxtStickyTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
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
                public function value(): string
                {
                    $this->text = $this->text . " world!";
                    return $this->text;
                }
            }
        );
        $cached->value();
        $result = $cached->value();

        $this->assertScalarThat(
            $result,
            new IsEqual("hello world!")
        );
    }
}
