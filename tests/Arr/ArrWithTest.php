<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrEmpty;
use Maxonfjvipon\ElegantElephant\Arr\ArrObject;
use Maxonfjvipon\ElegantElephant\Arr\ArrWith;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Constraint\IsEqual;

use function Maxonfjvipon\ElegantElephant\array_with;

final class ArrWithTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function simpleArrWith(): void
    {
        $this->assertArrThat(
            new ArrWith(
                new ArrEmpty(),
                2
            ),
            new IsEqual([0 => 2])
        );
    }

        /**
     * @test
     * @return void
     * @throws Exception
     */
    public function simpleArrWithFunc(): void
    {
        $this->assertThat(
            array_with(
                new ArrEmpty(),
                2
            ),
            new IsEqual([0 => 2])
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function complexArrWith(): void
    {
        $this->assertArrThat(
            new ArrWith(
                new ArrWith(
                    new ArrWith(
                        new ArrWith(
                            new ArrEmpty(),
                            2
                        ),
                        "key",
                        "value"
                    ),
                    TxtOf::str("hello world")
                ),
                NumOf::int(42)
            ),
            new IsEqual([
                0 => 2,
                "key" => "value",
                1 => "hello world",
                2 => 42
            ])
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrWithArrObject(): void
    {
        $this->assertArrThat(
            new ArrWith(
                [1, 2],
                new ArrObject(
                    "key",
                    "value"
                )
            ),
            new IsEqual([1, 2, ["key" => "value"]])
        );
    }
}
