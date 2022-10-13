<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrIf;
use Maxonfjvipon\Elegant_Elephant\Boolean\BooleanOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\Count;

final class ArrIfTest extends TestCase
{
    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrayIfTrue(): void
    {
        $this->assertScalarThat(
            new ArrIf(true, [1, 2, 3]),
            new Count(3)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrayIfFalse(): void
    {
        $this->assertScalarThat(
            new ArrIf(false, [1, 2, 3]),
            new Count(0)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
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
     * @throws Exception
     */
    public function arrayIfWithLogical(): void
    {
        $this->assertScalarThat(
            new ArrIf(new BooleanOf(false), fn () => new ArrayableOf([1, 2, 3])),
            new Count(0)
        );
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function arrayIfWithArrayIf(): void
    {
        $this->assertScalarThat(
            new ArrIf(
                true,
                new ArrIf(
                    new BooleanOf(true),
                    fn () => [1, 2, 3]
                )
            ),
            new Count(3)
        );
    }
}
