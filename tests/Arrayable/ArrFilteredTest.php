<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrFiltered;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\Count;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrFilteredTest extends TestCase
{
    public const GIVEN = [1, 2, 5, 6, 7, 8];
    public const EXPECTED = [3 => 6, 4 => 7, 5 => 8];

    /**
     * @param int $num
     * @return bool
     */
    private function filter(int $num): bool
    {
        return $num > 5;
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function filteredWithGivenCallback(): void
    {
        $this->assertMixedCastThat(
            new ArrFiltered(self::GIVEN, \Closure::fromCallable([$this, 'filter'])),
            new IsEqual(self::EXPECTED)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function countOfFiltered(): void
    {
        $this->assertMixedCastThat(
            new ArrFiltered(self::GIVEN, fn ($num) => $num > 4),
            new Count(4)
        );
    }
}
