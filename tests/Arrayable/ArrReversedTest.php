<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrReversed;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrValues;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


/**
 * Array reversed test
 */
final class ArrReversedTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function reversedWorks(): void
    {
        $this->assertScalarThat(
            ArrValues(
                ArrReversed([1, 2, 3, 4, 5])
            )->value(),
            new IsEqual([5, 4, 3, 2, 1])
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function reversedAndBack(): void
    {
        $this->assertScalarThat(
            ArrValues(
                ArrReversed(
                    ArrReversed([1, 2, 3, 4, 5])
                )
            )->value(),
            new IsEqual([1, 2, 3, 4, 5])
        );
    }
}
