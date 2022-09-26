<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrEmpty;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMapped;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMerged;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class ArrMergedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function mergedOfArrays(): void
    {
        Assert::assertThat(
            ArrMerged::new([1, 2], ['foo', 'bar'])->asArray(),
            new IsEqual([1, 2, 'foo', 'bar'])
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function mergedOfArrayables(): void
    {
        Assert::assertThat(
            ArrMerged::new(new ArrayableOf([1, 2]), ['foo', 'bar'])->asArray(),
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
        Assert::assertThat(
            ArrMerged::new($self = [1, 2, 3], new ArrEmpty(), [])->asArray(),
            new IsEqual($self)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function mergedOfTwoMapped(): void
    {
        Assert::assertThat(
            ArrMerged::new(
                ...ArrMapped::new(
                    [1, 2],
                    fn ($num) => ArrMapped::new(
                        ["A", "B"],
                        fn ($sym) => "$num$sym"
                    )
                )
            )->asArray(),
            new IsEqual(["1A", "1B", "2A", "2B"])
        );
    }
}
