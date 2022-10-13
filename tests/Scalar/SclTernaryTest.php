<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Scalar;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Boolean\BooleanOf;
use Maxonfjvipon\Elegant_Elephant\Scalar\SclTernary;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtBlank;
use Maxonfjvipon\Elegant_Elephant\Text\TxtTernary;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

final class SclTernaryTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function sclTernaryWithPrimitives(): void
    {
        $this->assertScalarThat(
            new SclTernary(true, "foo", "bar"),
            new IsEqual("foo")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sclTernaryWithLogicalAndScalars(): void
    {
        $this->assertScalarThat(
            new SclTernary(new BooleanOf(false), new TextOf("foo"), new TxtUpper(new TextOf("bar"))),
            new IsEqual("BAR")
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function sclTernaryWithCallbacks(): void
    {
        $this->assertScalarThat(
            new SclTernary(
                new BooleanOf(true),
                fn () => new TextOf("hey there!"),
                fn () => new ArrayableOf(['Hello world!'])
            ),
            new IsEqual("hey there!")
        );
    }
}
