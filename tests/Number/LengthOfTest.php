<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Number;

use Exception;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Num\LengthOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtOf;
use Maxonfjvipon\ElegantElephant\Txt\TxtUpper;
use PHPUnit\Framework\Constraint\IsEqual;

final class LengthOfTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function lengthOfString(): void
    {
        $this->assertMixedCastThat(
            new LengthOf("foo"),
            new IsEqual(3)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function lengthOfText(): void
    {
        $this->assertMixedCastThat(
            new LengthOf(new TxtUpper(new TxtOf("foo-bar"))),
            new IsEqual(7)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function lengthOfArray(): void
    {
        $this->assertMixedCastThat(
            new LengthOf([1, 2, 3, 4]),
            new IsEqual(4)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function lengthOfArrayable(): void
    {
        $this->assertMixedCastThat(
            new LengthOf(ArrOf::items(1, 2, 3, 4, 5)),
            new IsEqual(5)
        );
    }
}
