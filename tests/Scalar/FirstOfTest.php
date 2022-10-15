<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Scalar;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\FirstOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Constraint\IsEqual;

final class FirstOfTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function firstOfString(): void
    {
        $this->assertMixedCastThat(
            new FirstOf("Hello world"),
            new IsEqual("H"),
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function firstOfText(): void
    {
        $this->assertMixedCastThat(
            new FirstOf(new TextOf("Hello world")),
            new IsEqual("H"),
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function firstOfArray(): void
    {
        $this->assertMixedCastThat(
            new FirstOf([42, 33.2, "Hello world!"]),
            new IsEqual(42),
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function firstOfArrayable(): void
    {
        $this->assertMixedCastThat(
            new FirstOf(new ArrayableOf([33, 12, "Hello there!"])),
            new IsEqual(33),
        );
    }
}
