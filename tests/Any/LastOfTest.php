<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Any;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\AnyOf;
use Maxonfjvipon\ElegantElephant\Any\FirstOf;
use Maxonfjvipon\ElegantElephant\Any\LastOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
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
        $this->assertAnyThat(
            LastOf::text("Hello world"),
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
        $this->assertAnyThat(
            LastOf::text(TxtOf::str("Hello world!")),
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
        $this->assertAnyThat(
            LastOf::arr([42, 33.2, "Hello world!"]),
            new IsEqual("Hello world!"),
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function lastOfArr(): void
    {
        $this->assertAnyThat(
            LastOf::arr(ArrOf::array([33, 12, "Hello there!"])),
            new IsEqual("Hello there!"),
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function lastOfStringCallCtor(): void
    {
        $this->assertAnyThat(
            new LastOf("Hello world"),
            new IsEqual("d"),
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function lastOfArrCallCtor(): void
    {
        $this->assertAnyThat(
            new LastOf(ArrOf::array([33, 12, "Hello there!"])),
            new IsEqual("Hello there!"),
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function lastOfNotArrayOrString(): void
    {
        $this->expectExceptionMessage("The element to get the last element from must be an array or string");
        (new LastOf(AnyOf::bool(true)))->value();
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function tryGetLastOfEmptyArray(): void
    {
        $this->expectExceptionMessage("Can't get the last element of an empty array");
        (new LastOf([]))->value();
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function tryGetLastOfEmptyString(): void
    {
        $this->expectExceptionMessage("Can't get the last element of an empty string");
        (new LastOf(""))->value();
    }
}
