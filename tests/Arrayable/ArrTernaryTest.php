<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrEmpty;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrObject;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrTernary;
use Maxonfjvipon\Elegant_Elephant\Logical\Truth;
use Maxonfjvipon\Elegant_Elephant\Logical\Untruth;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class ArrTernaryTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function arrTernaryWithPrimitives(): void
    {
        Assert::assertThat(
            ArrTernary::new(true, [1, 2], [3, 4])->asArray(),
            new IsEqual([1, 2])
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function arrTernaryWithLogicalAndArrayable(): void
    {
        Assert::assertThat(
            ArrTernary::new(new Untruth(), new ArrayableOf([1, 2]), new ArrObject('key', 'value'))->asArray(),
            new IsEqual(['key' => 'value'])
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function arrTernaryWithCallbacks(): void
    {
        Assert::assertThat(
            ArrTernary::new(
                new Truth(),
                fn () => new ArrayableOf([1, 2]),
                fn () => new ArrEmpty()
            )->asArray(),
            new IsEqual([1, 2])
        );
    }
}
