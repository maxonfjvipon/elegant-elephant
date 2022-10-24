<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Scalar;

use Exception;
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
        $this->assertMixedCastThat(
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
        $this->assertMixedCastThat(
            new LastOf(new TxtOf("Hello world!")),
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
        $this->assertMixedCastThat(
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
        $this->assertMixedCastThat(
            new LastOf(new ArrOf([33, 12, "Hello there!"])),
            new IsEqual("Hello there!"),
        );
    }
}
