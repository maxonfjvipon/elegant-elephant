<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\FirstOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrReversed;
use Maxonfjvipon\ElegantElephant\Arr\ArrValues;
use Maxonfjvipon\ElegantElephant\Logic\IsEqual;
use Maxonfjvipon\ElegantElephant\Num\SumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtLowered;
use PHPUnit\Framework\Constraint\IsTrue;

final class IsEqualTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function isEqualOfInts(): void
    {
        $this->assertLogicThat(
            new IsEqual(10, 10),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEqualOfIntAndNum(): void
    {
        $this->assertLogicThat(
            new IsEqual(42, new SumOf([40, 2])),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEqualOfStringAndTxt(): void
    {
        $this->assertLogicThat(
            new IsEqual("hey", new TxtLowered("Hey")),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isEqualOfArrayAndArr(): void
    {
        $this->assertLogicThat(
            new IsEqual(new ArrValues(new ArrReversed(ArrOf::array([3, 2, 1]))), [1, 2, 3]),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function equalityOfAnyAndText(): void
    {
        $this->assertLogicThat(
            new IsEqual(new FirstOf(['foo', 'bar']), new TxtLowered("FOO")),
            new IsTrue()
        );
    }
}
