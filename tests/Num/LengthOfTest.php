<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Num;

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
        $this->assertNumThat(
            new LengthOf("foo"),
            new IsEqual(3)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function lengthOfTxt(): void
    {
        $this->assertNumThat(
            new LengthOf(new TxtUpper(TxtOf::str("foo-bar"))),
            new IsEqual(7)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function lengthOfArray(): void
    {
        $this->assertNumThat(
            new LengthOf([1, 2, 3, 4]),
            new IsEqual(4)
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function lengthOfArr(): void
    {
        $this->assertNumThat(
            new LengthOf(ArrOf::items(1, 2, 3, 4, 5)),
            new IsEqual(5)
        );
    }
}
