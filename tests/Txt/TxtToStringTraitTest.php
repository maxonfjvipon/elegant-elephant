<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Txt;

use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\StringableTxt;
use Maxonfjvipon\ElegantElephant\Txt\TxtToString;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtToStringTraitTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function txtToString(): void
    {
        $this->assertThat(
            (new class implements StringableTxt {
                use TxtToString;

                /**
                 * @return string
                 */
                public function asString(): string
                {
                    return "Hello world!";
                }
            })->__toString(),
            new IsEqual("Hello world!")
        );
    }
}