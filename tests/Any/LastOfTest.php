<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Any;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Any\LastOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class LastOfTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function lastOfString(): void
    {
        Assert::assertThat(
            (new LastOf("Hello world"))->asAny(),
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
        Assert::assertThat(
            (new LastOf(new TextOf("Hello world!")))->asAny(),
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
        Assert::assertThat(
            (new LastOf([42, 33.2, "Hello world!"]))->asAny(),
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
        Assert::assertThat(
            (new LastOf(new ArrayableOf([33, 12, "Hello there!"])))->asAny(),
            new IsEqual("Hello there!"),
        );
    }
}
