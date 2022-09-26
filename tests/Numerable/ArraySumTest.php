<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrayableOf;
use Maxonfjvipon\Elegant_Elephant\Numerable\ArraySum;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

final class ArraySumTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function arraySumOfArray(): void
    {
        Assert::assertThat(
            ArraySum::new([1, 2, 3, 4])->asNumber(),
            new IsEqual(10)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function arraySumOfArrayable(): void
    {
        Assert::assertThat(
            ArraySum::new(ArrayableOf::items(2, 3, 4))->asNumber(),
            new IsEqual(9)
        );
    }
}
