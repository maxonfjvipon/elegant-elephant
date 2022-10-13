<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrIf;
use Maxonfjvipon\Elegant_Elephant\Boolean\True;
use Maxonfjvipon\Elegant_Elephant\Boolean\Untruth;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\Count;


final class ArrIfTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @return void
     */
    public function arrayIfTrue(): void
    {
        $this->assertScalarThat(
            ArrIf(true, [1, 2, 3]),
            new Count(3)
        );
    }

    /**
     * @test
     * @return void
     */
    public function arrayIfFalse(): void
    {
        $this->assertScalarThat(
            ArrIf(false, [1, 2, 3]),
            new Count(0)
        );
    }

    /**
     * @test
     * @return void
     */
    public function arrayIfTrueWithCallback(): void
    {
        $this->assertScalarThat(
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
        $this->assertScalarThat(
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
        $this->assertScalarThat(
            new ArrIf(
                true,
                new ArrIf(
                    new True(),
                    fn () => [1, 2, 3]
                )
            ),
            new Count(3)
        );
    }
}
