<?php

namespace Arrayable;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrEmpty;
use Maxonfjvipon\ElegantElephant\Arr\ArrWith;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrWithTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function complexArrWith(): void
    {
        $this->assertMixedCastThat(
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
                    new TxtOf("hello world")
                ),
                new NumOf(42)
            ),
            new IsEqual([
                0 => 2,
                "key" => "value",
                1 => "hello world",
                2 => 42
            ])
        );
    }
}
