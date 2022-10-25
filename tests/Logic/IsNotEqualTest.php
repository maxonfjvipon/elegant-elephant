<?php

namespace Maxonfjvipon\ElegantElephant\Tests\Logic;

use Exception;
use Maxonfjvipon\ElegantElephant\Any\FirstOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrOf;
use Maxonfjvipon\ElegantElephant\Arr\ArrReversed;
use Maxonfjvipon\ElegantElephant\Arr\ArrValues;
use Maxonfjvipon\ElegantElephant\Logic\IsNotEqual;
use Maxonfjvipon\ElegantElephant\Num\SumOf;
use Maxonfjvipon\ElegantElephant\Tests\TestCase;
use Maxonfjvipon\ElegantElephant\Txt\TxtLowered;
use PHPUnit\Framework\Constraint\IsTrue;

final class IsNotEqualTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function isNotEqualOfInts(): void
    {
        $this->assertLogicThat(
            new IsNotEqual(11, 10),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEqualOfIntAndNum(): void
    {
        $this->assertLogicThat(
            new IsNotEqual(43, new SumOf([40, 2])),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEqualOfStringAndTxt(): void
    {
        $this->assertLogicThat(
            new IsNotEqual("hey!", new TxtLowered("Hey")),
            new IsTrue()
        );
    }

    /**
     * @test
     * @throws Exception
     */
    public function isNotEqualOfArrayAndArr(): void
    {
        $this->assertLogicThat(
            new IsNotEqual(new ArrValues(new ArrReversed(ArrOf::array([3, 2, 1]))), [3, 2, 1]),
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
            new IsNotEqual(new FirstOf(['foo', 'bar']), new TxtLowered("FOO!")),
            new IsTrue()
        );
    }
}