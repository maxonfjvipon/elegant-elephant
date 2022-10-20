<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Constraint\IsEqual;
use Stringable;

final class TextOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function textOfStringTest(): void
    {
        $this->assertMixedCastThat(
            new TextOf("foo"),
            new IsEqual("foo")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function textOfNumTest(): void
    {
        $this->assertMixedCastThat(
            new TextOf(5),
            new IsEqual("5")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textOfStringableTest(): void
    {
        $this->assertMixedCastThat(
            new TextOf(new class implements Stringable {
                public function __toString()
                {
                    return "foo";
                }
            }),
            new IsEqual("foo")
        );
    }
}
