<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Txt;

use Exception;
use Maxonfjvipon\ElegantElephant\Tests\Support\IsTxt;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt;
use Maxonfjvipon\ElegantElephant\Txt\TxtSticky;

final class TxtStickyTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function doesNotChangeValue(): void
    {
        $this->assertTxtThat(
            $cached = new TxtSticky(
                new class("hello") implements Txt {
                    /**
                     * Ctor.
                     * @param string $text
                     */
                    final public function __construct(private string $text)
                    {
                    }

                    /**
                     * @return string
                     */
                    final public function asString(): string
                    {
                        $this->text = $this->text . " world!";
                        return $this->text;
                    }
                }
            ),
            new IsTxt($cached)
        );
    }
}
