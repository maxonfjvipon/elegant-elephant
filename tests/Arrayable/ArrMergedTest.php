<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrEmpty;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMapped;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMerged;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrMergedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function mergedOfArrays(): void
    {
        $this->assertMixedCastThat(
            new ArrMerged([1, 2], ['foo', 'bar']),
            new IsEqual([1, 2, 'foo', 'bar'])
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function mergedOfArrayables(): void
    {
        $this->assertMixedCastThat(
            new ArrMerged(new ArrayableOf([1, 2]), ['foo', 'bar']),
            new IsEqual([1, 2, 'foo', 'bar'])
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function mergedOfSelfAndEmpties(): void
    {
        $this->assertMixedCastThat(
            new ArrMerged($self = [1, 2, 3], new ArrEmpty(), []),
            new IsEqual($self)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function mergedOfTwoMapped(): void
    {
        $this->assertMixedCastThat(
            new ArrMerged(
                ...new ArrMapped(
                    [1, 2],
                    fn ($num) => new ArrMapped(
                        ["A", "B"],
                        fn ($sym) => "$num$sym"
                    )
                )
            ),
            new IsEqual(["1A", "1B", "2A", "2B"])
        );
    }
}
