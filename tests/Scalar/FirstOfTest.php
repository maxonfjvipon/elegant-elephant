<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Scalar;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\FirstOf;
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
            new FirstOf(new TxtOf("Hello world")),
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
            new FirstOf(new ArrOf([33, 12, "Hello there!"])),
            new IsEqual(33),
        );
    }
}
