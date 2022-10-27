<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arr;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\AnyOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrCast;
use Maxonfjvipon\ElegantElephant\Arr\ArrMapped;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Logic\LogicOf;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrMappedTest extends TestCase
{
    public const GIVEN = [1, 2, 3, 4, 5];
    public const EXPECTED = [1, 4, 9, 16, 25];

    /**
     * @test
     * @throws Exception
     */
    public function mapped(): void
    {
        $this->assertArrThat(
            new ArrMapped(
                self::GIVEN,
                fn ($value) => $value * $value
            ),
            new IsEqual(self::EXPECTED)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function mappedCast(): void
    {
        $this->assertArrThat(
            new ArrCast(
                new ArrMapped(
                    self::GIVEN,
                    fn ($num) => TxtOf::str($num . "L"),
                )
            ),
            new IsEqual([
                "1L",
                "2L",
                "3L",
                "4L",
                "5L"
            ])
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function mappedWithEnsuring(): void
    {
        $this->assertArrThat(
            new ArrMapped(
                [
                    'any' => 5,
                    'arr' => [1, 2],
                    'txt' => "Hello, Jeff",
                    'logic' => true,
                    'num' => 10
                ],
                fn ($key, $value) => match ($key) {
                    'any' => AnyOf::just($value),
                    'arr' => ArrOf::array($value),
                    'txt' => TxtOf::str($value),
                    'logic' => LogicOf::bool($value),
                    'num' => NumOf::int(10)
                },
                ensure: true
            ),
            new IsEqual([
                5,
                [1, 2],
                "Hello, Jeff",
                true,
                10
            ])
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function mappedKeyValue(): void
    {
        $this->assertArrThat(
            new ArrMapped(
                self::GIVEN,
                fn ($key, $value) => $key * $value
            ),
            new IsEqual([
                0, 2, 6, 12, 20
            ])
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function mappedWithWrongAmountOfArguments(): void
    {
        $this->expectExceptionMessage("Invalid amount of arguments");
        (new ArrMapped([1, 2], fn () => "Hey"))->asArray();
    }
}
