<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrReversed;
use Maxonfjvipon\ElegantElephant\Arr\ArrValues;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;

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
        $this->assertMixedCastThat(
            new ArrValues(
                new ArrReversed([1, 2, 3, 4, 5])
            ),
            new IsEqual([5, 4, 3, 2, 1])
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function reversedAndBack(): void
    {
        $this->assertMixedCastThat(
            new ArrValues(
                new ArrReversed(
                    new ArrReversed([1, 2, 3, 4, 5])
                )
            ),
            new IsEqual([1, 2, 3, 4, 5])
        );
    }
}
