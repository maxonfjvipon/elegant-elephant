<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Arrayable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrReversed;
use Maxonfjvipon\Elegant_Elephant\Arrayable\ArrValues;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
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
        $this->assertScalarThat(
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
        $this->assertScalarThat(
            new ArrValues(
                new ArrReversed(
                    new ArrReversed([1, 2, 3, 4, 5])
                )
            ),
            new IsEqual([1, 2, 3, 4, 5])
        );
    }
}
