<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumerableOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

final class NumerableOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function numerableOfInt(): void
    {
        Assert::assertThat(
            NumerableOf::new(4)->asNumber(),
            new IsEqual(4)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numerableOfFloat(): void
    {
        Assert::assertThat(
            NumerableOf::new(12.1)->asNumber(),
            new IsEqual(12.1)
        );
    }
}
