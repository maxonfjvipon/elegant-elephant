<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Scalar;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Scalar\LastOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Constraint\IsEqual;

final class LastOfTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function lastOfString(): void
    {
        $this->assertScalarThat(
            new LastOf("Hello world"),
            new IsEqual("d"),
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function lastOfText(): void
    {
        $this->assertScalarThat(
            new LastOf(new TextOf("Hello world!")),
            new IsEqual("!"),
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function lastOfArray(): void
    {
        $this->assertScalarThat(
            new LastOf([42, 33.2, "Hello world!"]),
            new IsEqual("Hello world!"),
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function lastOfArrayable(): void
    {
        $this->assertScalarThat(
            new LastOf(new ArrayableOf([33, 12, "Hello there!"])),
            new IsEqual("Hello there!"),
        );
    }
}
