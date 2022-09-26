<?php

namespace Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtFromCallback;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class TxtFromCallbackTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function stringFromCallback(): void
    {
        Assert::assertThat(
            TxtFromCallback::new(fn () => "Hey there!")->asString(),
            new IsEqual("Hey there!")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function textFromCallback(): void
    {
        Assert::assertThat(
            TxtFromCallback::new(fn () => new TxtUpper(new TextOf("hello there")))->asString(),
            new IsEqual("HELLO THERE")
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function withError(): void
    {
        $this->expectError();
        TxtFromCallback::new(fn () => ["Hello world"])->asString();
    }
}
