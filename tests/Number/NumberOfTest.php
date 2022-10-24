<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Number;

use Exception;
use Maxonfjvipon\ElegantElephant\Num\NumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use PHPUnit\Framework\Constraint\IsEqual;

final class NumberOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function numerableOfInt(): void
    {
        $this->assertMixedCastThat(
            new NumOf(4),
            new IsEqual(4)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function numerableOfFloat(): void
    {
        $this->assertMixedCastThat(
            new NumOf(12.1),
            new IsEqual(12.1)
        );
    }
}
