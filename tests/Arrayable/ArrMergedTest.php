<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrEmpty;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMapped;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrMerged;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class ArrMergedTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function mergedOfArrays(): void
    {
        $this->assertScalarThat(
            ArrMerged([1, 2], ['foo', 'bar'])->value(),
            new IsEqual([1, 2, 'foo', 'bar'])
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function mergedOfArrayables(): void
    {
        $this->assertScalarThat(
            ArrMerged(new ArrayableOf([1, 2]), ['foo', 'bar'])->value(),
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
        $this->assertScalarThat(
            ArrMerged($self = [1, 2, 3], new ArrEmpty(), [])->value(),
            new IsEqual($self)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function mergedOfTwoMapped(): void
    {
        $this->assertScalarThat(
            ArrMerged(
                ...ArrMapped(
                    [1, 2],
                    fn ($num) => ArrMapped(
                        ["A", "B"],
                        fn ($sym) => "$num$sym"
                    )
                )
            )->value(),
            new IsEqual(["1A", "1B", "2A", "2B"])
        );
    }
}
