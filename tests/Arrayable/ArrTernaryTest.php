<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrEmpty;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrObject;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrTernary;
use Maxonfjvipon\Elegant_Elephant\Boolean\BooleanOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class ArrTernaryTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function arrTernaryWithPrimitives(): void
    {
        $this->assertScalarThat(
            new ArrTernary(true, [1, 2], [3, 4]),
            new IsEqual([1, 2])
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function arrTernaryWithLogicalAndArrayable(): void
    {
        $this->assertScalarThat(
            new ArrTernary(new BooleanOf(false), new ArrayableOf([1, 2]), new ArrObject('key', 'value')),
            new IsEqual(['key' => 'value'])
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function arrTernaryWithCallbacks(): void
    {
        $this->assertScalarThat(
            new ArrTernary(
                new BooleanOf(true),
                fn () => new ArrayableOf([1, 2]),
                fn () => new ArrEmpty()
            ),
            new IsEqual([1, 2])
        );
    }
}
