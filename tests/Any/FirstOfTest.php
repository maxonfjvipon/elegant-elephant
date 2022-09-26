<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Any;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any\FirstOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class FirstOfTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function firstOfString(): void
    {
        Assert::assertThat(
            (new FirstOf("Hello world"))->asAny(),
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
        Assert::assertThat(
            (new FirstOf(new TextOf("Hello world")))->asAny(),
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
        Assert::assertThat(
            (new FirstOf([42, 33.2, "Hello world!"]))->asAny(),
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
        Assert::assertThat(
            (new FirstOf(new ArrayableOf([33, 12, "Hello there!"])))->asAny(),
            new IsEqual(33),
        );
    }
}
