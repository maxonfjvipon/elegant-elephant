<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrFiltered;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\Count;
use PHPUnit\Framework\Constraint\IsEqual;


final class ArrFilteredTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
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
        $this->assertScalarThat(
            ArrFiltered(self::GIVEN, \Closure::fromCallable([$this, 'filter']))->value(),
            new IsEqual(self::EXPECTED)
        );
    }

    /**
     * @test
     * @return void
     */
    public function countOfFiltered(): void
    {
        $this->assertScalarThat(
            ArrFiltered(self::GIVEN, fn ($num) => $num > 4),
            new Count(4)
        );
    }
}
