<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrCast;
use Maxonfjvipon\ElegantElephant\Arr\ArrMapped;
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
        $this->assertMixedCastThat(
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
        $this->assertMixedCastThat(
            new ArrCast(
                new ArrMapped(
                    self::GIVEN,
                    fn ($num) => new TxtOf($num . "L"),
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
     * @throws Exception
     */
    public function mappedKeyValue(): void
    {
        $this->assertMixedCastThat(
            new ArrMapped(
                self::GIVEN,
                fn ($key, $value) => $key * $value
            ),
            new IsEqual([
                0, 2, 6, 12, 20
            ])
        );
    }
}
