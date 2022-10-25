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

final class FirstOfTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function firstOfString(): void
    {
        $this->assertAnyThat(
            FirstOf::text("Hello world"),
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
        $this->assertAnyThat(
            FirstOf::text(TxtOf::str("Hello world")),
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
        $this->assertAnyThat(
            FirstOf::arr([42, 33.2, "Hello world!"]),
            new IsEqual(42),
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function firstOfArr(): void
    {
        $this->assertAnyThat(
            FirstOf::arr(ArrOf::array([33, 12, "Hello there!"])),
            new IsEqual(33),
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function firstOfStringCallCtor(): void
    {
        $this->assertAnyThat(
            new FirstOf("Hello world"),
            new IsEqual("H"),
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function firstOfArrCallCtor(): void
    {
        $this->assertAnyThat(
            new FirstOf(ArrOf::array([33, 12, "Hello there!"])),
            new IsEqual(33),
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function firstOfNotArrayOrString(): void
    {
        $this->expectExceptionMessage("The element to get the first element from must be an array or string");
        (new FirstOf(AnyOf::bool(true)))->value();
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function tryGetFirstOfEmptyArray(): void
    {
        $this->expectExceptionMessage("Can't get the first element of an empty value");
        (new FirstOf([]))->value();
    }
}
