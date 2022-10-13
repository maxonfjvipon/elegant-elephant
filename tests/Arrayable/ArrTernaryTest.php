<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrEmpty;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrObject;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrTernary;
use Maxonfjvipon\Elegant_Elephant\Boolean\True;
use Maxonfjvipon\Elegant_Elephant\Boolean\Untruth;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class ArrTernaryTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function arrTernaryWithPrimitives(): void
    {
        $this->assertScalarThat(
            ArrTernary(true, [1, 2], [3, 4])->value(),
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
            ArrTernary(new Untruth(), new ArrayableOf([1, 2]), new ArrObject('key', 'value'))->value(),
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
            ArrTernary(
                new True(),
                fn () => new ArrayableOf([1, 2]),
                fn () => new ArrEmpty()
            )->value(),
            new IsEqual([1, 2])
        );
    }
}
