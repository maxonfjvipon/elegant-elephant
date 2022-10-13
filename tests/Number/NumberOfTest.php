<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Number;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumberOf;
use Maxonfjvipon\Elegant_Elephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class NumberOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function numerableOfInt(): void
    {
        $this->assertScalarThat(
            new NumberOf(4),
            new IsEqual(4)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numerableOfFloat(): void
    {
        $this->assertScalarThat(
            new NumberOf(12.1),
            new IsEqual(12.1)
        );
    }
}
