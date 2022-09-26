<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrReversed;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrValues;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

/**
 * Array reversed test
 */
final class ArrReversedTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function reversedWorks(): void
    {
        Assert::assertThat(
            ArrValues::new(
                ArrReversed::new([1, 2, 3, 4, 5])
            )->asArray(),
            new IsEqual([5, 4, 3, 2, 1])
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function reversedAndBack(): void
    {
        Assert::assertThat(
            ArrValues::new(
                ArrReversed::new(
                    ArrReversed::new([1, 2, 3, 4, 5])
                )
            )->asArray(),
            new IsEqual([1, 2, 3, 4, 5])
        );
    }
}
