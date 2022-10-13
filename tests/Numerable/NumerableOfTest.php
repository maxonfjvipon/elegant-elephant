<?php

namespace Maxonfjvipon\Elegant_Elephant\Tests\Numerable;

use Exception;
use Maxonfjvipon\Elegant_Elephant\Numerable\NumberOf;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;


final class NumerableOfTest extends \Maxonfjvipon\Elegant_Elephant\Tests\TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function numerableOfInt(): void
    {
        $this->assertScalarThat(
            NumberOf(4)->value(),
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
            NumberOf(12.1)->value(),
            new IsEqual(12.1)
        );
    }
}
