<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrIf;
use Maxonfjvipon\Elegant_Elephant\Logical\Truth;
use Maxonfjvipon\Elegant_Elephant\Logical\Untruth;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\Count;
use PHPUnit\Framework\TestCase;

final class ArrIfTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function arrayIfTrue(): void
    {
        Assert::assertThat(
            ArrIf::new(true, [1, 2, 3]),
            new Count(3)
        );
    }

    /**
     * @test
     * @return void
     */
    public function arrayIfFalse(): void
    {
        Assert::assertThat(
            ArrIf::new(false, [1, 2, 3]),
            new Count(0)
        );
    }

    /**
     * @test
     * @return void
     */
    public function arrayIfTrueWithCallback(): void
    {
        Assert::assertThat(
            new ArrIf(true, fn () => new ArrayableOf([1, 2, 3])),
            new Count(3)
        );
    }

    /**
     * @test
     * @return void
     */
    public function arrayIfWithLogical(): void
    {
        Assert::assertThat(
            new ArrIf(new Untruth(), fn () => new ArrayableOf([1, 2, 3])),
            new Count(0)
        );
    }

    /**
     * @test
     * @return void
     */
    public function arrayIfWithArrayIf(): void
    {
        Assert::assertThat(
            new ArrIf(
                true,
                new ArrIf(
                    new Truth(),
                    fn () => [1, 2, 3]
                )
            ),
            new Count(3)
        );
    }
}
