<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Boolean\BooleanOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtBlank;
use Maxonfjvipon\Elegant_Elephant\Text\TxtTernary;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtTernaryTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function textTernaryWithPrimitives(): void
    {
        $this->assertMixedCastThat(
            new TxtTernary(true, "foo", "bar"),
            new IsEqual("foo")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textTernaryWithLogicalAndTexts(): void
    {
        $this->assertMixedCastThat(
            new TxtTernary(new BooleanOf(false), new TextOf("foo"), new TxtUpper(new TextOf("bar"))),
            new IsEqual("BAR")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function textTernaryWithCallbacks(): void
    {
        $this->assertMixedCastThat(
            new TxtTernary(
                new BooleanOf(true),
                fn () => new TextOf("hey there!"),
                fn () => new TxtBlank()
            ),
            new IsEqual("hey there!")
        );
    }
}
