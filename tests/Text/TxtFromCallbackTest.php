<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Text;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use Maxonfjvipon\Elegant_Elephant\Text\TextOf;
use Maxonfjvipon\Elegant_Elephant\Text\TxtFromCallback;
use Maxonfjvipon\Elegant_Elephant\Text\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtFromCallbackTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function stringFromCallback(): void
    {
        $this->assertScalarThat(
            new TxtFromCallback(fn () => "Hey there!"),
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
        $this->assertScalarThat(
            new TxtFromCallback(fn () => new TxtUpper(new TextOf("hello there"))),
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
        (new TxtFromCallback(fn () => ["Hello world"]))->asString();
    }
}
