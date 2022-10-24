<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Text;

use Exception;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtFromCallback;
use Maxonfjvipon\ElegantElephant\Txt\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

final class TxtFromCallbackTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function stringFromCallback(): void
    {
        $this->assertMixedCastThat(
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
        $this->assertMixedCastThat(
            new TxtFromCallback(fn () => new TxtUpper(new TxtOf("hello there"))),
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
